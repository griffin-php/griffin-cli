<?php

declare(strict_types=1);

namespace GriffinTest\Cli\Command;

use Griffin\Cli\Command\Plan;
use Minicli\App;
use PHPUnit\Framework\TestCase;

class PlanTest extends TestCase
{
    protected function setUp(): void
    {
        $this->app = $this->createMock(App::class);

        $this->command = new Plan($this->app);
    }

    public function testConstructor(): void
    {
        $this->assertSame($this->app, $this->command->getApp());
    }
}
