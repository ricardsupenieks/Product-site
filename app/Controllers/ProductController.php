<?php

namespace App\Controllers;

use App\Template;

class ProductController
{
    public function index(): Template
    {
        return new Template('layout.twig');
    }
}