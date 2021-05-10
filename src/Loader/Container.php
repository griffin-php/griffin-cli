<?php

declare(strict_types=1);

namespace Griffin\Cli\Loader;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    public function get(string $id): mixed
    {
        return new $id();
    }

    public function has(string $id): bool
    {
        return class_exists($id);
    }
}
