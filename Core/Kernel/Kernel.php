<?php

namespace Core\Kernel;

use Core\Road\Routes;
use Core\Traits\Kernel\KernelTrait;
use ReflectionException;


class Kernel
{

    /**
     * @throws ReflectionException
     * @version 0.0.1
     */
    final public function __construct()
    {
        $this->routing();
    }

    use KernelTrait;

    /**
     * @throws ReflectionException
     * @version 0.0.1
     */
    final public function routing(): void
    {
        $routes = new Routes();
        $controllers = self::replaceKey(scandir('../src/Controller/'));
        $routes->registerRoutesFromControllerAttributes('/fastPhp/public', $controllers);
    }
}
