<?php

declare(strict_types=1);

namespace GriffinTest\Cli\Command;

use Griffin\Cli\Command\Plan;
use Griffin\Cli\Config\Config;
use Minicli\App;
use Minicli\Command\CommandCall;
use Minicli\Output\OutputHandler;
use PHPUnit\Framework\TestCase;

class PlanTest extends TestCase
{
    protected function setUp(): void
    {
        $this->app    = new App();
        $this->config = new Config();

        $this->command = new Plan($this->app, $this->config);
    }

    public function testConstructor(): void
    {
        $this->assertSame($this->app, $this->command->getApp());
        $this->assertSame($this->config, $this->command->getConfig());
    }

    public function testUp(): void
    {
        $this->expectOutputString(<<<EOS
GriffinTest\Cli\Migration\One
GriffinTest\Cli\Migration\Two

EOS
        );

        $this->config->setPatterns([
            __DIR__ . '/../Migration/Two.php',
            __DIR__ . '/../Migration/One.php',
        ]);

        ($this->command)(new CommandCall(['bin', 'plan', 'up']));
    }

    public function testDown(): void
    {
        $this->expectOutputString(<<<EOS
GriffinTest\Cli\Migration\Two
GriffinTest\Cli\Migration\One

EOS
        );

        $this->config->setPatterns([
            __DIR__ . '/../Migration/One.php',
            __DIR__ . '/../Migration/Two.php',
        ]);

        ($this->command)(new CommandCall(['bin', 'plan', 'down']));
    }
}
