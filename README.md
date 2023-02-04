# Product-site

## Main features
* Mass delete products
* Add products
* Dynamic validation

## Requirements
* PHP version: ^7.4 
* MySQL version: 8.0.31
* Composer version ^2.4.4

## Used packages
* [Carbon](https://carbon.nesbot.com/)
* [Twig](https://twig.symfony.com/)
* [Dotenv](https://packagist.org/packages/vlucas/phpdotenv)
* [Fast route](https://packagist.org/packages/nikic/fast-route)
* [Dbal](https://packagist.org/packages/doctrine/dbal)

## Installation
1. Clone this repository
2. Run <code> composer install </code>
3. Rename ".env.example" to ".env" and enter the correct information in the parenthesis
4. In public/index.php change PATH_TO_DOTENV to the path of the root folder of the .env file.
5. Import the "schema.sql"
6. You can run the development website by running <code> php -S localhost:8000 </code>
