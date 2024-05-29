<?php

namespace Core;

class Router {

    protected $routes = [];

    protected function add($method, $uri, $controller) {

        $this->routes[] = compact('method','uri','controller'); // funktioniert wie der Code im Kommentar unten

        /*
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
        */

    }

    public function get($uri, $controller) {

        $this->add('GET', $uri, $controller);

    }

    public function post($uri, $controller) {

        $this->add('POST', $uri, $controller);

    }

    public function delete($uri, $controller) {

        $this->add('DELETE', $uri, $controller);

    }

    public function patch($uri, $controller) {

        $this->add('PATCH', $uri, $controller);

    }

    public function put($uri, $controller) {

        $this->add('PUT', $uri, $controller);

    }

    public function route($uri, $method) {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    protected function abort($code = 404) {

        http_response_code($code); // Funktion zur Rückgabe eines Fehlercodes

        require base_path("views/{$code}.php"); // Es sollten alle Fehlercodes überprüfen werden, aber bisher gibt es nur einen.

        die();
    }

}