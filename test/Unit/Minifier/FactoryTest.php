<?php

namespace MinifineTest;

use Minifine\Factory;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testImplementsInterface()
    {
        $this->assertInstanceOf('\\Minifine\\Builder', new Factory());
    }

    /**
     * @covers Minifine\Factory::build
     */
    public function testBuildDevelopment()
    {
        $this->assertInstanceOf('\\Minifine\\Minifine', (new Factory())->build(__DIR__));
    }

    /**
     * @covers Minifine\Factory::build
     */
    public function testBuildProduction()
    {
        $this->assertInstanceOf('\\Minifine\\Minifine', (new Factory())->build(__DIR__, true));
    }
}
