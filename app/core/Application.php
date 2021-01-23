<?php

namespace App\Core;

class Application
{
    public Router $router;
    public Request $request;
    public static Application $app;
    
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
    
    public function renderView($view) {
        return $this->router->renderView($view);
    }
    
    public function run()
    {
        echo $this->router->resolve();
    }
}
