<?php

declare(strict_types=1);

namespace Griffin\Cli\Config;

use Exception as BaseException;

class Exception extends BaseException
{
    const PATTERN_INVALID_TYPE = 0b1;
}
