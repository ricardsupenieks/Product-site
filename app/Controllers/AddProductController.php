<?php

namespace App\Controllers;

use App\Models\Product;
use App\Redirect;
use App\Services\ProductsService;
use App\Template;
use App\Validation\ProductValidation;

class AddProductController
{
    public function __construct()
    {
        $this->productService = new ProductsService();
        $this->validation = new ProductValidation();
    }

    public function index()
    {
       return new Template('productAdd.twig');
    }

    public function execute()
    {
        if($this->validation->skuTaken($_POST['sku'])) {
            $_SESSION['error']['skuTaken'] = true;

            return new Redirect('/add');
        }
        $product = new Product(
            $_POST['productType'],
            $_POST['sku'],
            $_POST['name'],
            $_POST['price'],
            $_POST['attribute']
        );

        $this->productService->storeProduct($product);
        return new Redirect('/');
    }
}