<?php

namespace App\Engine\Core\Router;

class Router
{

    private $routes = [];

    private $host;
    private $dispatcher;

    public function __construct($host)
    {
        $this->host = $host;
    }

    /**
     * @param $key
     * @param $pattern
     * @param $controller
     * @param $method
     * @return void
     */
    public function add($key, $pattern, $controller, $method = 'GET')
    {
        $this->routes[$key] = [
            'pattern' => $pattern,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function dispatch($method, $uri)
    {
        return $this->getDispatcher()->dispatch($method, $uri);
    }

    public function getDispatcher()
    {
        if ($this->dispatcher == null) {
            $this->dispatcher = new UrlDispatcher();
            foreach ($this->routes as $route) {
                $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
            }
        }
        return $this->dispatcher;
    }
}