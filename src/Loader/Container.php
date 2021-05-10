<?php

declare(strict_types=1);

namespace Griffin\Cli\Loader;

use Psr\Container\ContainerInterface;
use Throwable;

/**
 * PSR-11 Container
 */
class Container implements ContainerInterface
{
    /**
     * Create Objects by Class Name Identifier
     *
     * @param string $id Class Name
     * @throws Exception Class Not Found or Error Initializing Object
     * @return mixed Expected Object
     */
    public function get(string $id): mixed
    {
        if (! $this->has($id)) {
            throw new Exception(
                sprintf('Unknown Class "%s"', $id),
                Exception::CLASS_UNKNOWN,
            );
        }

        try {
            return new $id();
        } catch (Throwable $t) {
            throw new Exception(
                sprintf('Error Found Initializing "%s"', $id),
                Exception::CLASS_ERROR,
            );
        }
    }

    /**
     * Check if Class Exists
     *
     * @param string $id Class Name
     * @return bool Expected Value
     */
    public function has(string $id): bool
    {
        return class_exists($id);
    }
}
