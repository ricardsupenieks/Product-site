<?php

namespace App\Controllers;

use App\Redirect;
use App\Services\ProductsService;
use App\Template;

class ProductsController
{

    public function __construct()
    {
        $this->productService = new ProductsService();
    }

    public function index()
    {
        $products = $this->productService->getProducts();

        return new Template('productList.twig', ['products' => $products->get()]);
    }

    public function delete()
    {
        foreach($_POST as $id) {
            $this->productService->deleteProduct((int)$id);
        }

        return new Redirect('/');
    }
}