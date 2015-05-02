<?php
/**
 * Interface for Minifine factories
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

/**
 * Interface for Minifine factories
 *
 * @category   Minifine
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
interface Builder
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
    public function build($basePath, $production = false);
}
