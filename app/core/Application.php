<?php

namespace App\Core;

class Application
{
    public static $ROOT_DIR;

    public string $layout = 'main';
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $db;
    public ?DbModel $user;

    public static Application $app;
    public ?Controller $controller = null;

    public function __construct($rootPath, array $config = [])
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        if ($this->allParamsForConnection($config['db'])) {
            $this->db = new Database($config['db']);

            $primaryValue = $this->session->get('user');
            if ($primaryValue) {
                $primaryKey = $this->userClass::primaryKey();
                $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
            } else {
                $this->user = null;
            }
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
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            Response::setStatusCode($e->getCode());
            echo $this->router->renderView('_error', [
                'exception' => $e
            ]);
        }
    }

    public static function isGuest()
    {
        return !self::$app->user;
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

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function getDisplayName()
    {
        return $this->user->getDisplayName();
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
}
