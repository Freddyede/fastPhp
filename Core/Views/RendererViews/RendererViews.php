<?php

namespace Core\Views\RendererViews;

use Core\Views\RendererViews\Headers\HeaderSet;
use JsonException;

class RendererViews extends HeaderSet
{

    public static ?array $parameters = [];

    /**
     * Renderer Views Constants
     */
    const RESPONSE_OK = 200;
    const RESPONSE_CREATED = 201;
    const RESPONSE_ACCEPTED = 202;
    const RESPONSE_BAD_REQUEST = 400;
    const RESPONSE_UNAUTHORIZED = 401;
    const RESPONSE_FORBIDDEN = 403;
    const RESPONSE_NOT_FOUND = 404;
    const RESPONSE_METHOD_NOT_ALLOWED = 405;
    const RESPONSE_INTERNAL_ERROR = 500;
    const RESPONSE_NOT_IMPLEMENTED = 501;
    const RESPONSE_BAD_GATEWAY = 502;
    const RESPONSE_GATEWAY_TIMEOUT = 503;
    const RESPONSE_VERSION_NOT_SUPPORTED = 504;
    const RESPONSE_INSUFFICIENT_STORAGE = 505;
    const RESPONSE_LOOP_DETECTED = 506;
    const RESPONSE_NOT_EXTENDED = 507;
    // section views

    /**
     * Return viewsTemplates
     * @param string $views
     * @param array|NULL $parameters
     * @return mixed
     * Isoler le code
     * @version 0.0.1
     * @author Patouillard Franck <patouillardfranck3@gmail.com>
     */
    public function rendererViews(string $views, array|null $parameters = []): mixed
    {
        self::setHeader('meta', 'utf-8');
        if (isset($parameters)) {
            foreach ($parameters as $key => $value) {
                self::setParameters($key, $value);
            }
        }
        return include_once __DIR__ . '/../../../templates/' . $views;
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
