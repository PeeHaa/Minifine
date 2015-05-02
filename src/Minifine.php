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
    private $basePath;

    private $production = false;

    private $jsMinifiers = [];

    private $cssMinifiers = [];

    public function __construct($basePath, $production = false)
    {
        $this->basePath   = $basePath;
        $this->production = $production;
    }

    public function appendJsMinifier(Minifier $minifier)
    {
        $this->append('js', $minifier);
    }

    public function prependJsMinifier(Minifier $minifier)
    {
        $this->prepend('js', $minifier);
    }

    public function appendCssMinifier(Minifier $minifier)
    {
        $this->append('css', $minifier);
    }

    public function prependCssMinifier(Minifier $minifier)
    {
        $this->prepend('css', $minifier);
    }

    private function append($type, Minifier $minifier)
    {
        switch ($type) {
            case 'js':
                $this->jsMinifiers[] = $minifier;
                break;

            case 'css':
                $this->cssMinifiers[] = $minifier;
                break;

            default:
                throw new InvalidTypeException('Can not append minifier of type `' . $type . '`.');
        }
    }

    private function prepend($type, Minifier $minifier)
    {
        switch ($type) {
            case 'js':
                array_unshift($this->jsMinifiers, $minifier);
                break;

            case 'css':
                array_unshift($this->cssMinifiers, $minifier);
                break;


            default:
                throw new InvalidTypeException('Can not prepend minifier of type `' . $type . '`.');
        }
    }

    public function css(array $files, $directory, $name)
    {
        if ($this->production) {
            return '<link rel="stylesheet" href="' . $directory . '/' . $name . '">';
        }

        $this->minify($files, $directory, $name, $this->cssMinifiers);

        $stylesheets = [];

        foreach ($files as $file) {
            $stylesheets[] = '<link rel="stylesheet" href="' . $file . '">';
        }

        return implode("\n", $stylesheets);
    }

    public function js(array $files, $directory, $name)
    {
        if ($this->production) {
            return '<script src="' . $directory . '/' . $name . '"></script>';
        }

        $this->minify($files, $directory, $name, $this->jsMinifiers);

        $scripts = [];

        foreach ($files as $file) {
            $scripts[] = '<script src="' . $file . '"></script>';
        }

        return implode("\n", $scripts);
    }

    private function minify($files, $directory, $name, array $minifiers)
    {
        $content = $this->merge($files, $minifiers);

        foreach ($minifiers as $minifier) {
            $content = $minifier->minify($content);
        }

        file_put_contents($this->basePath . $directory . '/' . $name, $content);
    }

    private function merge(array $files)
    {
        $content = '';

        foreach ($files as $file) {
            $content .= file_get_contents($this->basePath . $file);
        }

        return $content;
    }
}
