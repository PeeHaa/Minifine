<?php

namespace MinifineTest;

use Minifine\Minifine;

class MinifineTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        @unlink(TEST_DATA_DIR . '/css/test.css');
        @unlink(TEST_DATA_DIR . '/js/test.js');
    }

    /**
     * @covers Minifine\Minifine::__construct
     */
    public function testConstructorDevelopment()
    {
        $this->assertInstanceOf('Minifine\\Minifine', new Minifine(TEST_DATA_DIR));
    }

    /**
     * @covers Minifine\Minifine::__construct
     */
    public function testConstructorProduction()
    {
        $this->assertInstanceOf('Minifine\\Minifine', new Minifine(TEST_DATA_DIR, true));
    }

    /**
     * @covers Minifine\Minifine::__construct
     * @covers Minifine\Minifine::appendJsMinifier
     * @covers Minifine\Minifine::append
     */
    public function testAppendJsMinifier()
    {
        $minifier = new Minifine(TEST_DATA_DIR);

        $this->assertNull($minifier->appendJsMinifier($this->getMock('Minifine\\Minifier\\Minifier')));
    }

    /**
     * @covers Minifine\Minifine::__construct
     * @covers Minifine\Minifine::prependJsMinifier
     * @covers Minifine\Minifine::prepend
     */
    public function testPrependJsMinifier()
    {
        $minifier = new Minifine(TEST_DATA_DIR);

        $this->assertNull($minifier->prependJsMinifier($this->getMock('Minifine\\Minifier\\Minifier')));
    }

    /**
     * @covers Minifine\Minifine::__construct
     * @covers Minifine\Minifine::appendCssMinifier
     * @covers Minifine\Minifine::append
     */
    public function testAppendCssMinifier()
    {
        $minifier = new Minifine(TEST_DATA_DIR);

        $this->assertNull($minifier->appendCssMinifier($this->getMock('Minifine\\Minifier\\Minifier')));
    }

    /**
     * @covers Minifine\Minifine::__construct
     * @covers Minifine\Minifine::prependCssMinifier
     * @covers Minifine\Minifine::prepend
     */
    public function testPrependCssMinifier()
    {
        $minifier = new Minifine(TEST_DATA_DIR);

        $this->assertNull($minifier->prependCssMinifier($this->getMock('Minifine\\Minifier\\Minifier')));
    }

    /**
     * @covers Minifine\Minifine::__construct
     * @covers Minifine\Minifine::appendCssMinifier
     * @covers Minifine\Minifine::append
     * @covers Minifine\Minifine::css
     */
    public function testCssProduction()
    {
        $minifier = new Minifine(TEST_DATA_DIR);

        $this->assertSame(
            '<link rel="stylesheet" href="/css/test.css">',
            $minifier->css(['/css/boostrap.min.css', '/css/jquery.min.css', 'custom.css'], '/css', 'test.css')
        );
    }

    /**
     * @covers Minifine\Minifine::__construct
     * @covers Minifine\Minifine::appendCssMinifier
     * @covers Minifine\Minifine::append
     * @covers Minifine\Minifine::css
     * @covers Minifine\Minifine::minify
     * @covers Minifine\Minifine::merge
     */
    public function testCssDevelopment()
    {
        $minifierMock = $this->getMock('Minifine\\Minifier\\Minifier');

        $minifierMock
            ->expects($this->once())
            ->method('minify')
            ->willReturn('minifiedcontent')
        ;

        $minifier = new Minifine(TEST_DATA_DIR);
        $minifier->appendCssMinifier($minifierMock);

        $this->assertSame(
            '<link rel="stylesheet" href="/css/bootstrap.min.css">'
            . "\n" . '<link rel="stylesheet" href="/css/jquery.min.css">'
            . "\n" . '<link rel="stylesheet" href="/css/custom.css">',
            $minifier->css(['/css/bootstrap.min.css', '/css/jquery.min.css', '/css/custom.css'], '/css', 'test.css')
        );

        $this->assertSame('minifiedcontent', file_get_contents(TEST_DATA_DIR . '/css/test.css'));
    }

    /**
     * @covers Minifine\Minifine::__construct
     * @covers Minifine\Minifine::appendCssMinifier
     * @covers Minifine\Minifine::append
     * @covers Minifine\Minifine::css
     * @covers Minifine\Minifine::minify
     * @covers Minifine\Minifine::merge
     */
    public function testCssDevelopmentAppendedMinifier()
    {
        $minifierMock = $this->getMock('Minifine\\Minifier\\Minifier');

        $minifierMock
            ->expects($this->once())
            ->method('minify')
            ->willReturn('minifiedcontent')
        ;

        $appendedMock = $this->getMock('Minifine\\Minifier\\Minifier');

        $appendedMock
            ->expects($this->once())
            ->method('minify')
            ->willReturn('appendedcontent')
        ;

        $minifier = new Minifine(TEST_DATA_DIR);
        $minifier->appendCssMinifier($minifierMock);
        $minifier->appendCssMinifier($appendedMock);

        $minifier->css(['/css/bootstrap.min.css', '/css/jquery.min.css', '/css/custom.css'], '/css', 'test.css');

        $this->assertSame('appendedcontent', file_get_contents(TEST_DATA_DIR . '/css/test.css'));
    }

    /**
     * @covers Minifine\Minifine::__construct
     * @covers Minifine\Minifine::appendCssMinifier
     * @covers Minifine\Minifine::append
     * @covers Minifine\Minifine::prependCssMinifier
     * @covers Minifine\Minifine::prepend
     * @covers Minifine\Minifine::css
     * @covers Minifine\Minifine::minify
     * @covers Minifine\Minifine::merge
     */
    public function testCssDevelopmentPrependedMinifier()
    {
        $minifierMock = $this->getMock('Minifine\\Minifier\\Minifier');

        $minifierMock
            ->expects($this->once())
            ->method('minify')
            ->willReturn('minifiedcontent')
        ;

        $prependedMock = $this->getMock('Minifine\\Minifier\\Minifier');

        $prependedMock
            ->expects($this->once())
            ->method('minify')
            ->willReturn('prependedcontent')
        ;

        $minifier = new Minifine(TEST_DATA_DIR);
        $minifier->appendCssMinifier($minifierMock);
        $minifier->prependCssMinifier($prependedMock);

        $minifier->css(['/css/bootstrap.min.css', '/css/jquery.min.css', '/css/custom.css'], '/css', 'test.css');

        $this->assertSame('minifiedcontent', file_get_contents(TEST_DATA_DIR . '/css/test.css'));
    }

    /**
     * @covers Minifine\Minifine::__construct
     * @covers Minifine\Minifine::appendJsMinifier
     * @covers Minifine\Minifine::append
     * @covers Minifine\Minifine::js
     */
    public function testJsProduction()
    {
        $this->assertSame(
            '<script src="/js/test.js"></script>',
            (new Minifine(TEST_DATA_DIR, true))->js(['/js/boostrap.min.js', '/js/jquery.min.js', '/js/main.js'], '/js', 'test.js')
        );
    }

    /**
     * @covers Minifine\Minifine::__construct
     * @covers Minifine\Minifine::appendJsMinifier
     * @covers Minifine\Minifine::append
     * @covers Minifine\Minifine::css
     * @covers Minifine\Minifine::minify
     * @covers Minifine\Minifine::merge
     */
    public function testJsDevelopment()
    {
        $minifierMock = $this->getMock('Minifine\\Minifier\\Minifier');

        $minifierMock
            ->expects($this->once())
            ->method('minify')
            ->willReturn('minifiedcontent')
        ;

        $minifier = new Minifine(TEST_DATA_DIR);
        $minifier->appendJsMinifier($minifierMock);

        $this->assertSame(
            '<script src="/js/bootstrap.min.js"></script>'
            . "\n" . '<script src="/js/jquery.min.js"></script>'
            . "\n" . '<script src="/js/main.js"></script>',
            $minifier->js(['/js/bootstrap.min.js', '/js/jquery.min.js', '/js/main.js'], '/js', 'test.js')
        );

        $this->assertSame('minifiedcontent', file_get_contents(TEST_DATA_DIR . '/js/test.js'));
    }

    /**
     * @covers Minifine\Minifine::__construct
     * @covers Minifine\Minifine::appendJsMinifier
     * @covers Minifine\Minifine::append
     * @covers Minifine\Minifine::css
     * @covers Minifine\Minifine::minify
     * @covers Minifine\Minifine::merge
     */
    public function testJsDevelopmentAppendedMinifier()
    {
        $minifierMock = $this->getMock('Minifine\\Minifier\\Minifier');

        $minifierMock
            ->expects($this->once())
            ->method('minify')
            ->willReturn('minifiedcontent')
        ;

        $appendedMock = $this->getMock('Minifine\\Minifier\\Minifier');

        $appendedMock
            ->expects($this->once())
            ->method('minify')
            ->willReturn('appendedcontent')
        ;

        $minifier = new Minifine(TEST_DATA_DIR);
        $minifier->appendJsMinifier($minifierMock);
        $minifier->appendJsMinifier($appendedMock);

        $minifier->js(['/js/bootstrap.min.js', '/js/jquery.min.js', '/js/main.js'], '/js', 'test.js');

        $this->assertSame('appendedcontent', file_get_contents(TEST_DATA_DIR . '/js/test.js'));
    }

    /**
     * @covers Minifine\Minifine::__construct
     * @covers Minifine\Minifine::appendJsMinifier
     * @covers Minifine\Minifine::append
     * @covers Minifine\Minifine::prependJsMinifier
     * @covers Minifine\Minifine::prepend
     * @covers Minifine\Minifine::css
     * @covers Minifine\Minifine::minify
     * @covers Minifine\Minifine::merge
     */
    public function testJsDevelopmentPrependedMinifier()
    {
        $minifierMock = $this->getMock('Minifine\\Minifier\\Minifier');

        $minifierMock
            ->expects($this->once())
            ->method('minify')
            ->willReturn('minifiedcontent')
        ;

        $prependedMock = $this->getMock('Minifine\\Minifier\\Minifier');

        $prependedMock
            ->expects($this->once())
            ->method('minify')
            ->willReturn('prependedcontent')
        ;

        $minifier = new Minifine(TEST_DATA_DIR);
        $minifier->appendJsMinifier($minifierMock);
        $minifier->prependJsMinifier($prependedMock);

        $minifier->js(['/js/bootstrap.min.js', '/js/jquery.min.js', '/js/main.js'], '/js', 'test.js');

        $this->assertSame('minifiedcontent', file_get_contents(TEST_DATA_DIR . '/js/test.js'));
    }

    /**
     * @covers Minifine\Minifine::__construct
     * @covers Minifine\Minifine::js
     * @covers Minifine\Minifine::minify
     * @covers Minifine\Minifine::merge
     */
    public function testMerge()
    {
        $minifier = new Minifine(TEST_DATA_DIR);

        $minifier->js(['/js/bootstrap.min.js', '/js/jquery.min.js', '/js/main.js'], '/js', 'test.js');

        $this->assertSame('|bootstrap||jquery||main|', file_get_contents(TEST_DATA_DIR . '/js/test.js'));
    }
}
