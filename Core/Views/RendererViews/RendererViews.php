<?php

namespace Core\Views\RendererViews;

use Core\Views\RendererViews\Headers\HeaderSet;
use JsonException;

class RendererViews extends HeaderSet
{

    public static ?array $parameters = [];

    // section views

    /**
     * Return viewsTemplates
     * @param string $views
     * @param array|NULL $parameters
     * @return void
     * Isoler le code
     * @version 0.0.1
     * @author Patouillard Franck <patouillardfranck3@gmail.com>
     */
    public function rendererViews(string $views, array|null $parameters = []): void
    {
        self::setHeader('meta', 'utf-8');
        if (isset($parameters)) {
            foreach ($parameters as $key => $value) {
                self::setParameters($key, $value);
            }
        }
        include_once __DIR__ . '/../../../templates/' . $views;
    }

    /**
     * @throws JsonException
     * @version 0.0.1
     */
    public static function renderJsonViews(array $array = [], ?int $statusCode = NULL): void
    {
        header('Content-Type: application/json');
        !is_null($statusCode) ? http_response_code($statusCode) : $statusCode;
        echo json_encode($array, JSON_THROW_ON_ERROR);
    }

    /**
     * Get one init in views
     * @param null $key
     * @return string|array|null
     * @author Patouillard Franck <patouillardfranck3@gmail.com>
     * @version 0.0.1
     */
    public static function get($key = NULL): string|array|null
    {
        return array_key_exists($key, self::$parameters) ? self::$parameters[$key] : self::getParameters();
    }

    // section getter/setter

    /**
     * Get all init in view
     * @return array|null
     * @version 0.0.1
     * @author Patouillard Franck <patouillardfranck3@gmail.com>
     */
    public static function getParameters(): array|null
    {
        return !empty(self::$parameters) ? self::$parameters : NULL;
    }

    /**
     * Set init of view in Controller
     * @param $key
     * @param $value
     * @author Patouillard Franck <patouillardfranck3@gmail.com>
     * @version 0.0.1
     */
    public function setParameters($key, $value): void
    {
        self::$parameters[$key] = $value;
    }
}
