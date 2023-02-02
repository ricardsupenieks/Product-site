<?php

namespace Aapp\Models\Collections;

use App\Models\Product;

class ProductCollection
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

    public function getStocks(): array
    {
        return $this->products;
    }
}