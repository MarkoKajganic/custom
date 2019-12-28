<?php

class Router {
    static function getController(array $routes) {
        $path = trim($_SERVER['REQUEST_URI'], '/');

        $params = [];
        foreach ($routes as $route => $controller) {
            if($route === '') {
                continue;
            }
            $routePattern = '/' . preg_replace(['/{(.*?)}/', '/\//'], ['(.*)', '\/'] , $route) . '$/';
            if (preg_match($routePattern, $path, $matches) === 1) {
                $params = array_slice($matches, 1);
                break;
            }
        }

        if($path === '') {
            foreach ($routes as $route => $controller) {
                if ($path === $route) {
                    break;
                }
            }
        }

        return array_merge(explode('@', $controller), $params);
    }
}