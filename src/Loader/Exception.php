<?php

declare(strict_types=1);

namespace Griffin\Cli\Loader;

use Exception as BaseException;
use Psr\Container\NotFoundExceptionInterface;

class Exception extends BaseException implements NotFoundExceptionInterface
{
    const CLASS_UNKNOWN = 0x01;
    const CLASS_ERROR   = 0x10;
}
