<?php

declare(strict_types=1);

namespace Griffin\Cli\Loader;

use Griffin\Harpy\Harpy;
use Griffin\Migration\Container as MigrationContainer;

/**
 * Loader
 */
class Loader
{
    /**
     * Harpy
     */
    protected Harpy $harpy;

    /**
     * Construtor
     *
     * @param Harpy $harpy Harpy
     */
    public function __construct(Harpy $harpy)
    {
        $this->harpy = $harpy;
    }

    /**
     * Retrieve Harpy
     *
     * @return Harpy Expected Object
     */
    public function getHarpy(): Harpy
    {
        return $this->harpy;
    }

    /**
     * Load
     */
    public function load(string $pattern): MigrationContainer
    {
        $container = new MigrationContainer();

        $classnames = $this->getHarpy()->search($pattern);

        foreach ($classnames as $classname) {
            $container->addMigration(new $classname);
        }

        return $container;
    }
}
