<?php



class Router
{

    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $this->routes = $this->getRoutes();
        foreach ($this->routes as $key => $val) {
            $this->add($key, $val);
        }
    }
    // here create router
    protected function getRoutes()
    {
        return [
            '/' => [
                'controller' => 'index',
                'action'     => 'index'
            ],
            '/ac' => [
                'controller' => 'index',
                'action'     => 'index'
            ],
        ];
    }

    protected function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    protected function match()
    {
        $url = $_SERVER['REQUEST_URI'];
        foreach ($this->routes as $route => $params) {
//            if($url === $route) {
                $this->params = $params;
                return true;
//            } elseif(preg_match($url, '.js')) {
//                $this->params = $params;
//                return true;
//            }
        }


        return false;
    }

    public function run()
    {
        if($this->match()) {
            $path = 'Controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if(class_exists($path)) {
                $action = $this->params['action'];
                if(method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    echo 'Action не найден';
                }
            } else {
                echo 'Не найден класс ' . $path;
            }
        }else {
            echo '404';
        }
    }
}