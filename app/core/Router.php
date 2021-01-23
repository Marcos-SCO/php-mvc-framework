<?php

namespace App\Core;

class Router
{
    public Request $request;
    protected array $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            Response::setStatusCode(404);
            // return $this->renderContent("Not founded...");
            return $this->renderView('_404');
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    public function renderView($view)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }
    
    protected function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();        
        
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }
    
    protected function layoutContent()
    {
        ob_start();
        include_once dirname(__DIR__) . '/views/layouts/main.php';
        return ob_get_clean();
    }

    protected function renderOnlyView($view)
    {
        ob_start();
        include_once dirname(__DIR__) . '/views/' . $view . '.php';
        return ob_get_clean();
    }
    
}
