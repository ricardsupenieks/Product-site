<?php

namespace App\Models\Collections;

use App\Models\Product;

class ProductsCollection
{
    private array $products = [];

    public function __construct(array $products)
    {
        foreach ($products as $product) {
            $this->add($product);
        }
    }

    public function add(Product $product): void
    {
        $this->products[] = $product;
    }

    public function get(): array
    {
        return $this->products;
    }
}