<?php

namespace App\Engine\Service\Database;

use App\Engine\Service\AbstractProvider;
use App\Engine\Core\Database\Connection;

class Provider extends AbstractProvider
{
    public $serviceName = 'db';

    public function init()
    {
        $db = new Connection();
        $this->di->set($this->serviceName, $db);
    }
}