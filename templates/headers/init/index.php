<?php

use Core\Views\RendererViews\RendererViews;

if (RendererViews::isPresent('meta')) {
    echo "\t" . '<meta charset="' . RendererViews::getHeadersStructure('meta') . '"/>' . "\n\t";
}

echo (RendererViews::isPresent('scripts')) && "\t" . RendererViews::getHeadersStructure('scripts') . "\n";

echo (RendererViews::isPresent('styles')) && "\t" . RendererViews::getHeadersStructure('styles') . "\n\t";

echo (RendererViews::isPresent('title')) ? "\t<title>" . RendererViews::getHeadersStructure('title') . "</title>\n\t" : "\t<title>Hello World !</title>";
