<?php

declare(strict_types=1);

namespace GriffinTest\Cli\Loader;

use Griffin\Cli\Loader\Container;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

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
}
