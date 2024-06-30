<?php

namespace App\Engine;

use App\Engine\Helper\Common;
class Cms
{
    private $di;
    public $router;

    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    public function run()
    {
        $this->router->add('home', '/', 'HomeController:index');
        $this->router->add('product', '/user/12', 'ProductController:index');
        $routerDispatch = $this->router->dispatch(Common::getMethod(),Common::getPathUrl());


//        print_r($this->di);
        print_r($routerDispatch);

    }
}