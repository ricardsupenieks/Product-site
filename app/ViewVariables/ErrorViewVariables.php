<?php

namespace App\ViewVariables;
class ErrorViewVariables
{
    public function getName(): string
    {
        return 'error';
    }

    public function getValue()
    {
        return $_SESSION['error'];
    }
}