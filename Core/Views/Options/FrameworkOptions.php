<?php

namespace Core\Views\Options;

class FrameworkOptions
{
    private const FRAMEWORK_VERSION = '1.0.0';
    private const ORM_VERSION = '1.0.0';
    private const VERSION = [
        'framework-version' => self::FRAMEWORK_VERSION,
        'orm-version' => self::ORM_VERSION
    ];

    protected static function getVersion(bool $php = false): bool|array
    {
        if ($php) {
            echo phpinfo();
            return true;
        }
        return self::VERSION;
    }
}