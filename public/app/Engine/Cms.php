<?php

namespace App\Engine;

use App\Engine\Core\Router\DispatchedRoute;
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
        try {
            $this->router->add('home', '/', 'HomeController:index');
            $this->router->add('product', '/news', 'HomeController:news');

            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

            list($class, $action) = explode(':', $routerDispatch->getController(), 2);
            $controller = '\\App\\cms\\Controller\\' . $class;
            call_user_func_array([new $controller($this->di), $action], [$routerDispatch->getParameters()]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}