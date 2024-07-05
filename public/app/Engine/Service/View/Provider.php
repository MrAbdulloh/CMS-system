<?php

namespace App\Engine\Service\View;

use App\Engine\Service\AbstractProvider;
use App\Engine\Core\Template\View;

class Provider extends AbstractProvider
{
    public $serviceName = 'view';

    public function init()
    {
        $view = new View();
        $this->di->set($this->serviceName, $view);
    }
}