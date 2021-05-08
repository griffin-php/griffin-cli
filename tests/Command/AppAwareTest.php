<?php

declare(strict_types=1);

namespace GriffinTest\Cli\Command;

use Griffin\Cli\Command\AppAwareTrait;
use Minicli\App;
use PHPUnit\Framework\TestCase;

class AppAwareTest extends TestCase
{
    protected function setUp(): void
    {
        $this->app   = $this->createMock(App::class);
        $this->aware = $this->getMockForTrait(AppAwareTrait::class);
    }

    public function testAware(): void
    {
        $this->assertNull($this->aware->getApp());
        $this->assertSame($this->aware, $this->aware->setApp($this->app));
        $this->assertSame($this->app, $this->aware->getApp());
        $this->assertSame($this->aware, $this->aware->setApp(null));
        $this->assertNull($this->aware->getApp());
    }
}
