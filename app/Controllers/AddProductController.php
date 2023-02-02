<?php

namespace App\Controllers;

use App\Template;

class ProductController
{
    public function index()
    {
       return new Template('productAdd.twig');
    }
}