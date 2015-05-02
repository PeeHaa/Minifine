<?php

namespace MinifineTest\Minifier\Css;

use Minifine\Minifier\Css\MatthiasMullie;

class MatthiasMullieTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Minifine\Minifier\Css\MatthiasMullie::__construct
     */
    public function testConstructorImplementsInterface()
    {
        $mock = $this->getMock('MatthiasMullie\\Minify\\CSS');

        $this->assertInstanceOf('\\Minifine\\Minifier\\Minifier', new MatthiasMullie($mock));
    }

    /**
     * @covers Minifine\Minifier\Css\MatthiasMullie::__construct
     * @covers Minifine\Minifier\Css\MatthiasMullie::minify
     */
    public function testMinify()
    {
        $mock = $this->getMock('MatthiasMullie\\Minify\\CSS');

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
