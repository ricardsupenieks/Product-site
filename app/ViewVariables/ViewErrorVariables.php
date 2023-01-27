<?php

namespace app\ViewVariables;

use app\Session;

class ViewErrorVariables implements ViewVariables
{
    public function getName(): string
    {
        return 'errors';
    }

    public function getValue(): array
    {
        return Session::get('errors') ?? [];
    }
}