<?php

namespace Core\Abstract;

use Core\Views\RendererViews\RendererViews;
use Core\Road\Attribute\Route;

class AbstractController extends RendererViews
{
    /**
     * Can redirect to roadName
     * @param string $roadName
     * @return void
     * @version 0.0.1
     */
    public static function redirect(string $roadName): void
    {
        Route::redirectRoute($roadName);
    }
}

