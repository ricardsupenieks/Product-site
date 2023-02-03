<?php

namespace App\Services;

use App\Models\Collections\ProductsCollection;
use App\Models\Product;
use App\Repositories\DatabaseProductsRepository;

class ProductsService
{
    private DatabaseProductsRepository $productRepository;
    public function __construct()
    {
        $this->productRepository = new DatabaseProductsRepository();
    }

    public function getProducts(): ProductsCollection
    {
        return $this->productRepository->get();
    }

    public function storeProduct(Product $product): void
    {
        $this->productRepository->store($product);
    }

    public function deleteProduct(int $productId): void
    {
        $this->productRepository->delete($productId);
    }
}