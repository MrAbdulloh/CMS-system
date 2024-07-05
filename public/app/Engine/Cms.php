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
        try {
//            $this->router->add('home', '/', 'HomeController:index');
//            $this->router->add('news', '/news', 'HomeController:news');
//            $this->router->add('news_single', '/news/(id:int)', 'HomeController:news_words');
            require_once __DIR__ . '/../cms/Route.php';
            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

            list($class, $action) = explode(':', $routerDispatch->getController(), 2);
            $controller = '\\App\\cms\\Controller\\' . $class;
            $parameters = $routerDispatch->getParameters();
//            var_dump($parameters['id']);
            call_user_func_array([new $controller($this->di), $action], [$parameters]);
//            call_user_func_array([new $controller($this->di), $action], [$parameters['id']]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}