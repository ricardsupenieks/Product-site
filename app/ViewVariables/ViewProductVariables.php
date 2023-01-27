<?php

namespace App\ViewVariables;

use App\Session;

class ViewProductVariables implements ViewVariables
{

    public function getName()
    {
        return 'products';
    }

    public function getValue()
    {
        return Session::get('products') ?? [];
    }
}