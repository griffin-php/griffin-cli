<?php

declare(strict_types=1);

namespace GriffinTest\Cli\Loader;

use Griffin\Cli\Loader\Container;
use Griffin\Cli\Loader\Exception;
use GriffinTest\Cli\Migration;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class ContainerTest extends TestCase
{
    protected function setUp(): void
    {
        $this->container = new Container();
    }

    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(ContainerInterface::class, $this->container);
    }

    public function testHas(): void
    {
        $this->assertTrue($this->container->has(Migration\One::class));
        $this->assertTrue($this->container->has(Migration\Two::class));
        $this->assertFalse($this->container->has(Migration\Three::class));
    }

    public function testGet(): void
    {
        $this->assertInstanceOf(Migration\One::class, $this->container->get(Migration\One::class));
        $this->assertInstanceOf(Migration\Two::class, $this->container->get(Migration\Two::class));
    }

    public function testNotFound(): void
    {
        $this->expectException(Exception::class);
        $this->expectException(NotFoundExceptionInterface::class);
        $this->expectExceptionMessage('Unknown Class "GriffinTest\Cli\Migration\Three"');
        $this->expectExceptionCode(Exception::CLASS_UNKNOWN);

        $this->container->get(Migration\Three::class);
    }
}
