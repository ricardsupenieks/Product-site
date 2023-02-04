<?php

namespace App\Controllers;

use App\Redirect;

class SiteController
{
    public function index(): Redirect {
        return new Redirect('/products');
    }
}