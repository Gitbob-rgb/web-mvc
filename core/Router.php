// core/Router.php
<?php

class Router {

    private $routes = [];

    public function add($method, $route, $controllerAction) {
        $this->routes[] = [
            'method' => strtoupper($method),
            'route' => $route,
            'controllerAction' => $controllerAction
        ];
    }

    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // Retirer le base URL, si défini
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = trim($uri, '/');

        // Recherche de la route correspondante
        foreach ($this->routes as $route) {
            if ($route['method'] == $method) {
                $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9-]+)', $route['route']);
                if (preg_match('#^' . $pattern . '$#', $uri, $matches)) {
                    $params = [];
                    foreach ($matches as $key => $value) {
                        if (!is_numeric($key)) {
                            $params[$key] = $value;
                        }
                    }

                    list($controllerName, $actionName) = explode('@', $route['controllerAction']);
                    $controllerName = ucfirst($controllerName) . 'Controller';
                    if (class_exists($controllerName)) {
                        $controller = new $controllerName();
                        if (method_exists($controller, $actionName)) {
                            call_user_func_array([$controller, $actionName], $params);
                        } else {
                            echo "Action '$actionName' non trouvée.";
                        }
                    } else {
                        echo "Contrôleur '$controllerName' non trouvé.";
                    }
                    return;
                }
            }
        }

        echo "Page non trouvée.";
    }

    public function get($route, $controllerAction) {
        $this->add('GET', $route, $controllerAction);
    }

    public function post($route, $controllerAction) {
        $this->add('POST', $route, $controllerAction);
    }

    public function put($route, $controllerAction) {
        $this->add('PUT', $route, $controllerAction);
    }

    public function delete($route, $controllerAction) {
        $this->add('DELETE', $route, $controllerAction);
    }
}
?>
