<?php

namespace App\Controllers;

use App\Redirect;
use App\Services\ProductsService;
use App\Template;

class ProductController
{

    public function __construct()
    {
        $this->productService = new ProductsService();
    }

    public function index()
    {
       return new Template('productList.twig');
    }

    public function delete()
    {
        foreach($_POST as $id) {
            $this->productService->deleteProduct($id);
        }

        return new Redirect('/');
    }
}