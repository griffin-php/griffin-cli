<?php

declare(strict_types=1);

namespace GriffinTest\Cli\Config;

use Griffin\Cli\Config\Config;
use Griffin\Cli\Config\ConfigAwareTrait;
use PHPUnit\Framework\TestCase;

class ConfigAwareTest extends TestCase
{
    protected function setUp(): void
    {
        $this->config = $this->createMock(Config::class);
        $this->aware  = $this->getMockForTrait(ConfigAwareTrait::class);
    }

    public function testAware(): void
    {
        $this->assertNull($this->aware->getConfig());
        $this->assertSame($this->aware, $this->aware->setConfig($this->config));
        $this->assertSame($this->config, $this->aware->getConfig());
        $this->assertSame($this->aware, $this->aware->setConfig(null));
        $this->assertNull($this->aware->getConfig());
    }
}
