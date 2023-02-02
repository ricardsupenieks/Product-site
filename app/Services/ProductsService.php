<?php

namespace App\Services;

use App\Repositories\DatabaseProductRepository;

class ProductsService
{
    private DatabaseProductRepository $productRepository;
    public function __construct()
    {
        $this->productRepository = new DatabaseProductRepository();
    }

    public function getProduct()
    {

    }

    public function storeProduct()
    {

    }

    public function deleteProduct(int $productId)
    {
        $this->productRepository->delete($productId);
    }
}