<?php
require_once __DIR__ . "/../../vendor/autoload.php";

use App\Engine\Cms;
use App\Engine\DI\DI;


try {
    $di = new DI();
    $services = require __DIR__ . '/Config/Service.php';

    foreach ($services as $service) {
        $provider = new $service($di);
        $provider->init();
    }
    $cms = new Cms($di);
    $cms->run();
} catch (\Exception $e) {
    echo $e->getMessage();
}