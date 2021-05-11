<?php

declare(strict_types=1);

namespace GriffinTest\Cli\Command;

use Griffin\Cli\Command\Plan;
use Minicli\App;
use Minicli\Command\CommandCall;
use Minicli\Output\OutputHandler;
use PHPUnit\Framework\TestCase;

class PlanTest extends TestCase
{
    protected function setUp(): void
    {
        $this->app = new App();

        $this->command = new Plan($this->app);
    }

    public function testConstructor(): void
    {
        $this->assertSame($this->app, $this->command->getApp());
    }

    public function testInvokable(): void
    {
        $this->expectOutputString(<<<EOS
GriffinTest\Cli\Migration\One
GriffinTest\Cli\Migration\Two

EOS
        );

        $arguments = new CommandCall([
            'bin',
            'plan',
            __DIR__ . '/../Migration/Two.php',
            __DIR__ . '/../Migration/One.php',
        ]);

        ($this->command)($arguments);
    }
}
