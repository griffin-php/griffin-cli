<?php

declare(strict_types=1);

namespace GriffinTest\Cli\Loader;

use Exception as BaseException;
use Griffin\Cli\Loader\Exception;
use PHPUnit\Framework\TestCase;
use Psr\Container\NotFoundExceptionInterface;

class ExceptionTest extends TestCase
{
    protected function setUp(): void
    {
        $this->exception = new Exception();
    }

    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(BaseException::class, $this->exception);
        $this->assertInstanceOf(NotFoundExceptionInterface::class, $this->exception); // PSR
    }

    public function testCodes(): void
    {
        $this->assertSame(1, Exception::CLASS_UNKNOWN);
        $this->assertSame(2, Exception::CLASS_ERROR);
    }
}
