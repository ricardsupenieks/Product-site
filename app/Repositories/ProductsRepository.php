<?php

namespace App\Repositories;

use App\Models\Collections\ProductsCollection;

interface ProductsRepository
{
    public function get(): ProductsCollection;
}