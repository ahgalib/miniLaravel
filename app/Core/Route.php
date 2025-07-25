<?php

namespace Core;

use ReflectionMethod;

class Route
{
    protected static array $routes = [];

    public static function get(string $uri, $action): void
    {
        self::$routes['GET'][$uri] = $action;
    }
    public static function post(string $uri, $action): void
    {
        self::$routes['POST'][$uri] = $action;
    }

    public static function dispatch(string $requestUri, string $requestMethod)
    {   

        // Get current URI
        $basePath = '/miniLaravel'; // Adjust this to your base path
        $uri = strtok($requestUri, '?'); // Remove query string
        $uri = str_replace($basePath, '', $uri);     // Remove base path

        $action = self::$routes[$requestMethod][$uri] ?? null;
      
        if (!$action) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        if (is_array($action)) {
            [$controller, $method] = $action;

            // Use the container to resolve the controller and its dependencies
            $container = new Container();
            $controllerInstance = $container->resolve($controller);

            //Resolve Method dependency
            $reflector = new ReflectionMethod($controller, $method);
            $params = $reflector->getParameters();
            $args = [];

            foreach ($params as $param) {
                $paramClass = $param->getType()?->getName();
                if ($paramClass) {
                    $args[] = $container->resolve($paramClass);
                }
            }


            $controllerInstance->$method(...$args);
            // call_user_func([$controllerInstance, $method], $args);
        } elseif (is_callable($action)) {
            call_user_func($action);
        }
    }
}
