<?php

namespace Core\Road;

use Core\Modules\RoutingModules;
use ReflectionException;

/**
 * @desc Routing of frameworks
 * @version 0.0.1
 */
class Routes
{

    public function __construct()
    {
    }

    /**
     * @throws ReflectionException
     * @version 0.0.1
     */
    final public function registerRoutesFromControllerAttributes($prefix, array $controllers): void
    {
        RoutingModules::readControllers($prefix, $controllers);
    }

    // section get

}
