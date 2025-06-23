<?php

namespace Core\Modules;

use Core\Road\Attribute\Route;
use ReflectionClass;
use ReflectionException;

class RoutingModules
{
    /**
     * @throws ReflectionException
     */
    public static function readControllers($prefix, array $controllers): void
    {
        foreach ($controllers as $controller) {
            $reflectionController = new ReflectionClass($controller);
            self::readMethods($reflectionController, $prefix, $controller);
        }
    }

    public static function readMethods($reflectionController, $prefix, $controller): void
    {
        foreach ($reflectionController->getMethods() as $method) {
            self::readAttribute($method, $prefix, $controller);
        }
    }

    public static function readAttribute($method, $prefix, $controller): void
    {
        foreach ($method->getAttributes(Route::class) as $attribute) {
            $route = $attribute->newInstance();
            self::get($prefix, $route->getPath(), $controller, $method->getName());
            if (array_key_exists('name', $attribute->getArguments())) {
                Route::setControllerName($attribute->getArguments()[0], $attribute->getArguments()['name']);
            }
        }
    }

    final public static function get($prefix, $path, $controller, $method): void
    {
        if ($_SERVER['REQUEST_URI'] === $prefix . $path) {
            (new $controller())->{$method}();
        }
    }
}