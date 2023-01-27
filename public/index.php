<?php

use app\Redirect;
use app\Session;
use app\Template;
use app\ViewVariables\ViewErrorVariables;
use app\ViewVariables\ViewProductVariables;
use app\ViewVariables\ViewVariables;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require '../vendor/autoload.php';

Session::start();

$dotenv = Dotenv\Dotenv::createImmutable('/home/ricards/PhpstormProjects/Product_site/');
$dotenv->load();

$loader = new FilesystemLoader('../views');
$twig = new Environment($loader);

$viewVariables = [
    ViewErrorVariables::class,
    ViewProductVariables::class
];

foreach ($viewVariables as $variable) {
    /** @var ViewVariables $variable */
    $variable = new $variable;
    $twig->addGlobal($variable->getName(), $variable->getValue());
}

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
//    $r->addRoute('GET', '/', [StocksController::class, 'index']);
//    $r->addRoute('GET', '/search', [StocksController::class, 'search']);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars

        [$controller, $method] = $handler;
        $response = (new $controller)->{$method}($vars);

        if ($response instanceof Template) {
            echo $twig->render($response->getPath(), $response->getParams());

            unset($_SESSION['errors']);
        }

        if ($response instanceof Redirect) {
            header('Location: ' . $response->getUrl());
        }
        break;
}