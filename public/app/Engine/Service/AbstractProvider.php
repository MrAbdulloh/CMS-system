<?php

namespace App\Engine\Service;

use App\Engine\DI\DI;

abstract class AbstractProvider
{
    protected $di;

    public function __construct(DI $di)
    {
        $this->di = $di;
    }
    abstract public function init();
}