<?php

namespace App\ViewVariables;

use App\Database;

class ViewProductVariables implements ViewVariables
{

    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function getName(): string
    {
        return 'products';
    }

    public function getValue(): array
    {
        $queryBuilder = $this->connection->createQueryBuilder();

        $products = $queryBuilder
            ->select('*')
            ->from('products')
            ->fetchAllAssociative();

        return $products;
    }
}