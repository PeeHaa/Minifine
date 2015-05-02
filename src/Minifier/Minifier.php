<?php
/**
 * Interface for minifiers
 *
 * PHP version 5.5
 *
 * @category   Minifine
 * @package    Minifier
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2015 Pieter Hordijk <https://pieterhordijk.com>
 * @license    See the LICENSE file
 * @version    1.0.0
 */
namespace Minifine\Minifier;

/**
 * Interface for minifiers
 *
 * @category   Minifine
 * @package    Minifier
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
interface Minifier
{
    /**
     * Minifies data
     *
     * @param string $data The data to be minified
     *
     * @return string The minified data
     */
    public function minify($data);
}
