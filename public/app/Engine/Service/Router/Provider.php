<?php

namespace App\Engine\Service\Router;

use App\Engine\Service\AbstractProvider;
use App\Engine\Core\Router\Router;

class Provider extends AbstractProvider
{
    public $serviceName = 'router';

    public function init()
    {
        $router = new Router('http://localhost:8080/');
        $this->di->set($this->serviceName, $router);
    }
}