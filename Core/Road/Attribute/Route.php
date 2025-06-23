<?php

namespace Core\Road\Attribute;

use Attribute;

#[Attribute]
class Route
{
    private static array $controllerName = [];
    public function __construct(private readonly string $path, private readonly ?string $name = NULL)
    {
    }

    /**
     * @param string $uri
     * @param string $name
     * @return array
     * @version 0.0.1
     */
    public static function setControllerName(string $uri, string $name): array
    {
        if (!array_key_exists($name, self::$controllerName)) {
            self::$controllerName[$name] = $uri;
        }
        return self::$controllerName;
    }

    /**
     * @param string $roadName
     * @return void
     * @version 0.0.1
     */
    public static function redirectRoute(string $roadName): void
    {
        header('location: http://localhost/endleFramework/public' . self::$controllerName[$roadName]);
    }

    /**
     * @return string
     * @version 0.0.1
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     * @version 0.0.1
     */
    public function getPath(): string
    {
        return $this->path;
    }
}
