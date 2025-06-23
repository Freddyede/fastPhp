<?php

// section sources
function getSources($className): array|string
{
    return str_replace("App\\", 'src\\', $className);
}


// section autoload
function autoload($className): void
{
    if (str_starts_with($className, "App\\")) {
        $className = getSources($className);
    } else if (str_starts_with($className, "Core\\")) {
        $className = getSources($className);
    }
    $link = str_replace("\\", "/", __DIR__ . "/" . $className);
    if (is_file($link . ".php")) {
        require_once($link . ".php");
    }
}

spl_autoload_register("autoload");
