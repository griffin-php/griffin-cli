<?php

declare(strict_types=1);

namespace GriffinTest\Cli\Loader;

use Griffin\Cli\Loader\Loader;
use Griffin\Harpy\Harpy;
use Griffin\Migration\Container as MigrationContainer;
use Griffin\Migration\MigrationInterface;
use GriffinTest\Cli\Migration;
use PHPUnit\Framework\TestCase;

class LoaderTest extends TestCase
{
    protected function setUp(): void
    {
        $this->harpy  = $this->createMock(Harpy::class);
        $this->loader = new Loader($this->harpy);
    }

    public function testConstructor(): void
    {
        $this->assertSame($this->harpy, $this->loader->getHarpy());
    }

    public function testBasic(): void
    {
        $this->harpy->expects($this->atLeast(1))
            ->method('search')
            ->with('/path/to/source')
            ->will($this->returnValue([
                Migration\One::class,
                Migration\Two::class,
            ]));

        $container = $this->loader->load('/path/to/source');

        $this->assertInstanceOf(MigrationContainer::class, $container);
        $this->assertCount(2, $container);
        $this->assertTrue($container->hasMigration(Migration\One::class));
        $this->assertTrue($container->hasMigration(Migration\Two::class));
    }
}
