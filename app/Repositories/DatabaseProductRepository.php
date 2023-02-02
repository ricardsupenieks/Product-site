<?php

namespace App\Repositories;

use Aapp\Models\Collections\ProductCollection;
use App\Database;
use App\Models\Product;

class DatabaseProductRepository
{
    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function get()
    {
        $queryBuilder = $this->connection->createQueryBuilder();

        $products = $queryBuilder
            ->select('*')
            ->from('products')
            ->fetchAllAssociative();

//        $productCollection = new ProductCollection([]);
//
//        foreach($products as $product) {
//            $product = (new Product(
//                $product['type'],
//                $product['sku'],
//                $product['name'],
//                $product['price'],
//                $product['attribute']
//            ));
//
//            $productCollection->add($product);
//        }
//
//        return $productCollection;

        return $products;
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function delete(int $productId)
    {
        $this->connection->delete('products', ['id' => $productId]);
    }
}