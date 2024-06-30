<?php

namespace App\Engine;

use App\Engine\Di\DI;

abstract class Controller
{
    protected $di;
    protected $db;

    public function __construct(DI $di)
    {
        $this->di = $di;
    }
}