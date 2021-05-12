<?php

declare(strict_types=1);

namespace GriffinTest\Cli\Config;

use Griffin\Cli\Config\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    protected function setUp(): void
    {
        $this->config = new Config();
    }

    public function testPatterns(): void
    {
        $this->assertSame([], $this->config->getPatterns());
        $this->assertSame($this->config, $this->config->setPatterns(['foo', 'bar']));
        $this->assertSame(['foo', 'bar'], $this->config->getPatterns());
        $this->assertSame($this->config, $this->config->setPatterns([]));
        $this->assertSame([], $this->config->getPatterns());
    }
}
