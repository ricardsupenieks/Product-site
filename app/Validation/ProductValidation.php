<?php

namespace App\Validation;

use App\Database;
use Doctrine\DBAL\Connection;

class ProductValidation
{
    private Connection $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function skuTaken(string $sku): bool
    {
        $emailsInDatabase = $this->connection->fetchAllKeyValue('SELECT id, sku FROM `product-site`.products');
        if (in_array($sku, $emailsInDatabase)) {
            return true;
        }
        return false;
    }
}