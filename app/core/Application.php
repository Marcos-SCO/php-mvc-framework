<?php

namespace App\Core;

class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public static Application $app;
    public static $ROOT_DIR;
    public Controller $controller;

    public function __construct($rootPath, array $config = [])
    {
        self::$app = $this;
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request);

        if ($this->allParamsForConnection($config)) {
            $this->db = new Database($config);
        }
    }

    public function allParamsForConnection(array $config)
    {
        foreach ($config as $key => $value) {
            if (empty($value) && $key != 'password') return false;
        }
        return true;
    }

    public function get($path, $callback)
    {
        $this->router->get($path, $callback);
    }

    public function post($path, $callback)
    {
        $this->router->post($path, $callback);
    }

    public function renderView($view, $params = [])
    {
        return $this->router->renderView($view, $params);
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    public function redirect(string $path)
    {
        $this->response->redirect($path);
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
