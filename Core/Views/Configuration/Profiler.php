<?php

namespace Core\Views\Configuration;

class Profiler
{
    public function __construct()
    {
        $this->loader();
    }

    public function loader(): void
    {
        include_once __DIR__ . '/../../../templates/components/profiler.php';
    }
}