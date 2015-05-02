<?php
/**
 * The main minifying class
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

use Minifine\Minifier\Minifier;

/**
 * The main minifying class
 *
 * @category   Minifine
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class Minifine
{
    /**
     * @var string The base path of the resources
     */
    private $basePath;

    /**
     * @var bool Whether we are running in production
     */
    private $production = false;

    /**
     * @var array List of JS minifiers
     */
    private $jsMinifiers = [];

    /**
     * @var array List of CSS minifiers
     */
    private $cssMinifiers = [];

    /**
     * Creates instance
     *
     * @param string $basePath   The base path of the resources
     * @param bool   $production Whether we are running in production
     */
    public function __construct($basePath, $production = false)
    {
        $this->basePath   = $basePath;
        $this->production = $production;
    }

    /**
     * Appends a JS minifier to the chain
     *
     * @param \Minifine\Minifier\Minifier $minifier Instance of a minifier
     */
    public function appendJsMinifier(Minifier $minifier)
    {
        $this->append('js', $minifier);
    }

    /**
     * Prepends a JS minifier to the chain
     *
     * @param \Minifine\Minifier\Minifier $minifier Instance of a minifier
     */
    public function prependJsMinifier(Minifier $minifier)
    {
        $this->prepend('js', $minifier);
    }

    /**
     * Appends a CSS minifier to the chain
     *
     * @param \Minifine\Minifier\Minifier $minifier Instance of a minifier
     */
    public function appendCssMinifier(Minifier $minifier)
    {
        $this->append('css', $minifier);
    }

    /**
     * Prepends a CSS minifier to the chain
     *
     * @param \Minifine\Minifier\Minifier $minifier Instance of a minifier
     */
    public function prependCssMinifier(Minifier $minifier)
    {
        $this->prepend('css', $minifier);
    }

    /**
     * Appends a minifier to the chain
     *
     * @param string                      $type     The type of minifier to append
     * @param \Minifine\Minifier\Minifier $minifier Instance of a minifier
     */
    private function append($type, Minifier $minifier)
    {
        switch ($type) {
            case 'js':
                $this->jsMinifiers[] = $minifier;
                break;

            case 'css':
                $this->cssMinifiers[] = $minifier;
                break;
        }
    }

    /**
     * Prepends a minifier to the chain
     *
     * @param string                      $type     The type of minifier to append
     * @param \Minifine\Minifier\Minifier $minifier Instance of a minifier
     */
    private function prepend($type, Minifier $minifier)
    {
        switch ($type) {
            case 'js':
                array_unshift($this->jsMinifiers, $minifier);
                break;

            case 'css':
                array_unshift($this->cssMinifiers, $minifier);
                break;
        }
    }

    /**
     * Combines and minifies CSS files
     *
     * @param string[] $files      List of files to combine and minify
     * @param string   $outputFile The output filename (this is relative to the base path)
     *
     * @return string The HTML of the generated stylesheet tag(s)
     */
    public function css(array $files, $outputFile)
    {
        if ($this->production) {
            return '<link rel="stylesheet" href="' . $outputFile . '">';
        }

        $this->minify($files, $outputFile, $this->cssMinifiers);

        $stylesheets = [];

        foreach ($files as $file) {
            $stylesheets[] = '<link rel="stylesheet" href="' . $file . '">';
        }

        return implode("\n", $stylesheets);
    }

    /**
     * Combines and minifies JS files
     *
     * @param string[] $files      List of files to combine and minify
     * @param string   $outputFile The output filename (this is relative to the base path)
     *
     * @return string The HTML of the generated stylesheet tag(s)
     */
    public function js(array $files, $outputFile)
    {
        if ($this->production) {
            return '<script src="' . $outputFile . '"></script>';
        }

        $this->minify($files, $outputFile, $this->jsMinifiers);

        $scripts = [];

        foreach ($files as $file) {
            $scripts[] = '<script src="' . $file . '"></script>';
        }

        return implode("\n", $scripts);
    }

    /**
     * Combines and minifies files
     *
     *
     * @param string[] $files      List of files to combine and minify
     * @param string   $outputFile The output filename (this is relative to the base path)
     * @param array    $minifiers  The list of minifiers to run
     */
    private function minify($files, $outputFile, array $minifiers)
    {
        $content = $this->merge($files, $minifiers);

        foreach ($minifiers as $minifier) {
            $content = $minifier->minify($content);
        }

        file_put_contents($this->basePath . $outputFile, $content);
    }

    /**
     * Merges files
     *
     * @param array $files List of files to merge
     *
     * @return string The merged content
     */
    private function merge(array $files)
    {
        $content = '';

        foreach ($files as $file) {
            $content .= file_get_contents($this->basePath . $file);
        }

        return $content;
    }
}
