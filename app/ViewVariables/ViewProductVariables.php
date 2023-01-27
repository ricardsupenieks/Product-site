<?php

namespace app\ViewVariables;

use app\Session;

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