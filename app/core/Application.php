<?php

namespace App\Core;

class Application
{
    public Router $router;
    public Request $request;
    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function get($path, $callback) {
        $this->router->get($path,$callback);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}
