<?php

declare(strict_types=1);

namespace GriffinTest\Cli\Config;

use Griffin\Cli\Config\Config;
use Griffin\Cli\Config\Exception;
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

    public function testInvalidPattern(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionCode(Exception::PATTERN_INVALID_TYPE);
        $this->expectExceptionMessage('Invalid Pattern "1" Type: "integer"');

        $this->config->setPatterns([1, 2]);
    }
}
