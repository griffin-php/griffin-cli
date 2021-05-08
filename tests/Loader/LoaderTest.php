<?php

declare(strict_types=1);

namespace GriffinTest\Cli\Loader;

use Griffin\Cli\Loader\Loader;
use Griffin\Harpy\Harpy;
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
}
