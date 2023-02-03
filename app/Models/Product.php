<?php

namespace App\Models;

class Product
{
    private ?int $id;
    private string $type;
    private string $sku;
    private string $name;
    private int $price;
    private string $attribute;

    public function __construct(?int $id,string $type, string $sku, string $name, int $price, string $attribute)
    {
        $this->id = $id;
        $this->type = $type;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->attribute = $attribute;
    }

    public function getId(): string
    {
        return $this->id;
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