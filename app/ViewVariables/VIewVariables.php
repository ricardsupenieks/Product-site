<?php

namespace App\ViewVariables;

interface VIewVariables {
    public function getName(): string;
    public function getValue(): array;
}