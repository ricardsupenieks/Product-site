<?php

namespace App\Controllers;

use App\Models\Product;
use App\Redirect;
use App\Services\ProductsService;
use App\Template;

class AddProductController
{
    public function __construct()
    {
        $this->productService = new ProductsService();
    }

    public function index()
    {
       return new Template('productAdd.twig');
    }

    public function execute()
    {
        var_dump($_POST);die;

        $newProduct = new Product(
            $_POST['productType'],
            $_POST['sku'],
            $_POST['name'],
            $_POST['price'],
            $_POST['attribute']
        );

        var_dump($newProduct);die;

        $this->productService->storeProduct();
        return new Redirect('/');
    }
}