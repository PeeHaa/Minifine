<?php

namespace MinifineTest\Minifier\Js;

use Minifine\Minifier\Js\MatthiasMullie;

class MatthiasMullieTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Minifine\Minifier\Js\MatthiasMullie::__construct
     */
    public function testConstructorImplementsInterface()
    {
        $mock = $this->getMock('MatthiasMullie\\Minify\\JS');

        $this->assertInstanceOf('\\Minifine\\Minifier\\Minifier', new MatthiasMullie($mock));
    }

    /**
     * @covers Minifine\Minifier\Js\MatthiasMullie::__construct
     * @covers Minifine\Minifier\Js\MatthiasMullie::minify
     */
    public function testMinify()
    {
        $mock = $this->getMock('MatthiasMullie\\Minify\\JS');

        $mock
            ->expects($this->once())
            ->method('add')
            ->will($this->returnCallback(function($data) {
                \PHPUnit_Framework_Assert::assertSame('passeddata', $data);
            }))
        ;

        $mock
            ->expects($this->once())
            ->method('minify')
            ->willReturn('minified')
        ;

        $this->assertSame('minified', (new MatthiasMullie($mock))->minify('passeddata'));
    }
}
