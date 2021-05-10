<?php

declare(strict_types=1);

namespace Griffin\Cli\Loader;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    public function get(string $id): mixed
    {
        if (! $this->has($id)) {
            throw new Exception(
                sprintf('Unknown Class "%s"', $id),
                Exception::CLASS_UNKNOWN,
            );
        }

        return new $id();
    }

    public function has(string $id): bool
    {
        return class_exists($id);
    }
}
