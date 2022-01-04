<?php

namespace Lucas\Mvc\Main;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

class Application
{
    private string $uri;
    private string $method;
    private array $routes = [];
    private Dispatcher $dispatcher;

    public function __construct(string $uri, string $method)
    {
        $this->method = $method;
        $this->setUri($uri);
    }

    private function setUri(string $uri): void
    {
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }

        $uri = rawurldecode($uri);
        $this->uri = $uri;
    }

    private function defineRoutes(): void
    {
        $this->dispatcher = simpleDispatcher(
            function (RouteCollector $router) {
                foreach ($this->routes as [$method, $route, $handler]) {
                    $router->addRoute($method, $route, $handler);
                }
            }
        );
    }

    public function addRoute(
        string $method,
        string $route,
        callable $handler
    ): self {
        array_push($this->routes, [$method, $route, $handler]);
        return $this;
    }

    public function run()
    {
        $this->defineRoutes();
        $routeInfo = $this->dispatcher->dispatch(
            $this->method,
            $this->uri
        );

        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                echo "404 - Not Found";
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = join(', ', $routeInfo[1]);
                echo "405 - Method Not Allowed, the allowed methods are $allowedMethods";
                break;
            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                $handler(...$vars);
                break;
            default:
                break;
        }
    }
}
