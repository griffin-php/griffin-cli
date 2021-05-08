<?php

declare(strict_types=1);

namespace Griffin\Cli\Command;

use Griffin\Cli\Command\Help;
use Minicli\App;
use PHPUnit\Framework\TestCase;

class HelpTest extends TestCase
{
    protected function setUp(): void
    {
        $this->app = $this->createMock(App::class);

        $this->command = new Help($this->app);
    }

    public function testConstructor(): void
    {
        $this->assertSame($this->app, $this->command->getApp());
    }
}
