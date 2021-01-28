<?php

namespace App\Core;

use App\Core\Middleware\BaseMiddleware;

class Controller
{
    public string $layout = 'main';
    public string $action = '';

    /**
     * @var \App\Core\Middleware\BaseMiddleware
     */
    protected array $middlewares = [];

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $params = [])
    {
        return Application::$app->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * Get the value of middlewares
     *
     * @return  \App\Core\Middleware\BaseMiddleware
     */ 
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}
