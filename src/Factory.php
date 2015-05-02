<?php
/**
 * The base factory to build minifiers
 *
 * PHP version 5.5
 *
 * @category   Minifine
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2015 Pieter Hordijk <https://pieterhordijk.com>
 * @license    See the LICENSE file
 * @version    1.0.0
 */
namespace Minifine;

use Minifine\Minifier\Js\MatthiasMullie as MatthiasMullieJs;
use Minifine\Minifier\Css\MatthiasMullie as MatthiasMullieCss;
use MatthiasMullie\Minify\JS;
use MatthiasMullie\Minify\CSS;

/**
 * The base factory to build minifiers
 *
 * @category   Minifine
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class Factory implements Builder
{
    /**
     * Builds a new minifine instance
     *
     * @param string $basePath   The base path to the resources (under most common cases this will be the public web
     *                           root directory)
     * @param bool   $production The current environment
     *
     * @return \Minifine\Minifine
     */
    public function build($basePath, $production = false)
    {
        $minifine = new Minifine($basePath, $production);

        $minifine->appendJsMinifier(new MatthiasMullieJs(new JS()));
        $minifine->appendCssMinifier(new MatthiasMullieCss(new Css()));

        return $minifine;
    }
}
