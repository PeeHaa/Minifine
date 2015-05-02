<?php
/**
 * JS minifier using MatthiasMullie's minify library
 *
 * PHP version 5.5
 *
 * @category   Minifine
 * @package    Minifier
 * @subpackage Js
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2015 Pieter Hordijk <https://pieterhordijk.com>
 * @license    See the LICENSE file
 * @version    1.0.0
 */
namespace Minifine\Minifier\Js;

use Minifine\Minifier\Minifier;
use MatthiasMullie\Minify\JS;

/**
 * JS minifier using MatthiasMullie's minify library
 *
 * @category   Minifine
 * @package    Minifier
 * @subpackage Js
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class MatthiasMullie implements Minifier
{
    /**
     * @var \MatthiasMullie\Minify\JS MatthiasMullie's JS minifier
     */
    private $minifier;

    /**
     * Creates instance
     *
     * @param \MatthiasMullie\Minify\JS $minifier MatthiasMullie's JS minifier
     */
    public function __construct(JS $minifier)
    {
        $this->minifier = $minifier;
    }

    /**
     * Minifies data
     *
     * @param string $content The data to be minified
     *
     * @return string The minified data
     */
    public function minify($data)
    {
        $this->minifier->add($data);

        return $this->minifier->minify();
    }
}
