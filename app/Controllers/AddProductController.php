<?php

namespace App\Controllers;

use App\Template;

class AddProductController
{
    public function index()
    {
       return new Template('productAdd.twig');
    }
}