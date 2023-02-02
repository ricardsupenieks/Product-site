<?php

namespace App\Models;

class Product
{
    private string $type;
    private string $sku;
    private string $name;
    private int $price;
    private string $attribute;

    public function __construct(string $type, string $sku, string $name, int $price, string $attribute)
    {
        $this->type = $type;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->attribute = $attribute;
    }


    public function getType(): string
    {
        return $this->type;
    }


    public function getSku(): string
    {
        return $this->sku;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getPrice(): int
    {
        return $this->price;
    }


    public function getAttribute(): string
    {
        return $this->attribute;
    }
}