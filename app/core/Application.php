<?php

namespace App\Core;

class Application
{
    public Router $router;
    public Request $request;
    public static Application $app;
    public Controller $controller;
    
    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }
    
    public function get($path, $callback) {
        $this->router->get($path,$callback);
    }
    
    public function post($path, $callback) {
        $this->router->post($path,$callback);
    }
    
    public function renderView($view, $params = []) {
        return $this->router->renderView($view, $params);
    }
    
    public function run()
    {
        echo $this->router->resolve();
    }

    /**
     * Get the value of controller
     */ 
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set the value of controller
     *
     * @return  self
     */ 
    public function setController($controller)
    {
        $this->controller = $controller;

        return $this;
    }
}
