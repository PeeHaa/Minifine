<?php
/**
 * CSS minifier using MatthiasMullie's minify library
 *
 * PHP version 5.5
 *
 * @category   Minifine
 * @package    Minifier
 * @subpackage Css
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2015 Pieter Hordijk <https://pieterhordijk.com>
 * @license    See the LICENSE file
 * @version    1.0.0
 */
namespace Minifine\Minifier\Css;

use Minifine\Minifier\Minifier;
use MatthiasMullie\Minify\CSS;

/**
 * CSS minifier using MatthiasMullie's minify library
 *
 * @category   Minifine
 * @package    Minifier
 * @subpackage Css
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class MatthiasMullie implements Minifier
{
    /**
     * @var \MatthiasMullie\Minify\CSS MatthiasMullie's CSS minifier
     */
    private $minifier;

    /**
     * Creates instance
     *
     * @param \MatthiasMullie\Minify\CSS $minifier MatthiasMullie's CSS minifier
     */
    public function __construct(CSS $minifier)
    {
        $this->minifier = $minifier;
    }

    /**
     * Minifies data
     *
     * @param string $data The data to be minified
     *
     * @return string The minified data
     */
    public function minify($data)
    {
        $this->minifier->add($data);

        return $this->minifier->minify();
    }
}
