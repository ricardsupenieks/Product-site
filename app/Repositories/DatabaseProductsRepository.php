<?php

namespace App\Repositories;

use App\Models\Collections\ProductsCollection;
use App\Database;
use App\Models\Product;

class DatabaseProductsRepository implements ProductsRepository
{
    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function get(): ProductsCollection
    {
        $queryBuilder = $this->connection->createQueryBuilder();

        $products = $queryBuilder
            ->select('*')
            ->from('products')
            ->fetchAllAssociative();

        $productCollection = new ProductsCollection([]);

        foreach($products as $product) {
            $product = (new Product(
                $product['id'],
                $product['type'],
                $product['sku'],
                $product['name'],
                $product['price'],
                $product['attribute']
            ));

            $productCollection->add($product);
        }

        return $productCollection;
    }

    public function store(Product $product): void
    {
        $this->connection->insert('`product-site`.products', [
            'type' => $product->getType(),
            'sku' => $product->getSku(),
            'name' => $product->getName(),
            'price' => $product->getPrice() * 100,
            'attribute' => $product->getAttribute(),
        ]);
    }

    public function delete(int $productId): void
    {
        $this->connection->delete('products', ['id' => $productId]);
    }
}