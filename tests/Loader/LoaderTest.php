<?php

declare(strict_types=1);

namespace GriffinTest\Cli\Loader;

use Griffin\Cli\Loader\Container;
use Griffin\Cli\Loader\Loader;
use Griffin\Harpy\Harpy;
use Griffin\Migration\Container as MigrationContainer;
use Griffin\Migration\MigrationInterface;
use GriffinTest\Cli\Migration;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class LoaderTest extends TestCase
{
    protected function setUp(): void
    {
        $this->harpy     = $this->createMock(Harpy::class);
        $this->container = new Container();
        $this->loader    = new Loader($this->harpy, $this->container);
    }

    public function testConstructor(): void
    {
        $this->assertSame($this->harpy, $this->loader->getHarpy());
        $this->assertSame($this->container, $this->loader->getContainer());
    }

    public function testHarpy(): void
    {
        $harpy = $this->createMock(Harpy::class);

        $this->assertInstanceOf(Harpy::class, $this->loader->getHarpy());
        $this->assertSame($this->loader, $this->loader->setHarpy($harpy));
        $this->assertSame($harpy, $this->loader->getHarpy());
        $this->assertSame($this->loader, $this->loader->setHarpy(null));
        $this->assertInstanceOf(Harpy::class, $this->loader->getHarpy());
    }

    public function testPsrContainer(): void
    {
        $container = $this->createMock(ContainerInterface::class);

        $this->assertInstanceOf(Container::class, $this->loader->getContainer());
        $this->assertSame($this->loader, $this->loader->setContainer($container));
        $this->assertSame($container, $this->loader->getContainer());
        $this->assertSame($this->loader, $this->loader->setContainer(null));
        $this->assertInstanceOf(Container::class, $this->loader->getContainer());
    }

    public function testBasic(): void
    {
        $this->harpy->expects($this->atLeast(1))
            ->method('search')
            ->with('/path/to/source', '/path/to/another/source')
            ->will($this->returnValue([
                Migration\One::class,
                Migration\Two::class,
            ]));

        $migrations = $this->loader->load('/path/to/source', '/path/to/another/source');

        $this->assertInstanceOf(MigrationContainer::class, $migrations);
        $this->assertCount(2, $migrations);
        $this->assertTrue($migrations->hasMigration(Migration\One::class));
        $this->assertTrue($migrations->hasMigration(Migration\Two::class));
    }
}
