<?php

namespace Core\Views\RendererViews\Headers;
use Core\Views\Options\FrameworkOptions;

class HeaderSet extends FrameworkOptions
{
    private static array $headersStructure = [];

    public static function setHeader(string|null $htmlKey, string|null $value, string|array|null $scripts = NULL): void
    {
        if ($htmlKey) {
            self::$headersStructure[$htmlKey] = $value;
        }
        if (is_array($scripts)) {
            foreach ($scripts as $key => $value) {
                self::setScripts($key, $value);
            }
        }
    }

    /**
     * @param $key
     * @return string|array|null
     * @version 0.0.1
     */
    public static function getHeadersStructure($key): string|array|null
    {
        $str = NULL;
        if (array_key_exists($key, self::$headersStructure) && !is_array(self::$headersStructure[$key])) {
            $str = self::$headersStructure[$key];
        }
        if (array_key_exists($key, self::$headersStructure) && is_array(self::$headersStructure[$key])) {
            $str = implode('', self::$headersStructure[$key]);
        }
        return $str;
    }

    public static function isPresent($key): bool
    {
        return array_key_exists($key, self::$headersStructure);
    }

    /**
     * @param string|null $key
     * @param string|array $script
     * @return void
     * @version 0.0.1
     */
    public static function setScripts(string|null $key, string|array $script): void
    {
        if ($key === 'scripts') {
            $i = 0;
            while ($i < count($script)) {
                self::$headersStructure[$key][$i] = '<script src="assets/scripts/' . $script[$i] . '.js"></script>';
                $i++;
            }
        }
        if ($key === 'styles') {
            $i = 0;
            while ($i < count($script)) {
                self::$headersStructure[$key][$i] = '<link rel="stylesheet" href="/styles/' . $script[$i] . '.css" />';
                $i++;
            }
        }
    }
}
