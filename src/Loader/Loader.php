<?php

declare(strict_types=1);

namespace Griffin\Cli\Loader;

use Griffin\Harpy\Harpy;
use Griffin\Migration\Container as MigrationContainer;
use Psr\Container\ContainerInterface;

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
     * PSR-11 Container
     */
    protected ContainerInterface $container;

    /**
     * Construtor
     *
     * @param Harpy $harpy Harpy
     * @param ContainerInterface $container PSR-11 Container
     */
    public function __construct(Harpy $harpy, ?ContainerInterface $container = null)
    {
        $this->harpy = $harpy;
        $this->container = $container ?? new Container();
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
     * Configure PSR Container
     *
     * @param ?ContainerInterface $container PSR Containter
     * @return Fluent Interface
     */
    public function setContainer(?ContainerInterface $container): self
    {
        $this->container = $container ?? new Container();

        return $this;
    }

    /**
     * Retrieve PSR Container
     *
     * @return ContainerInterface Expected Object
     */
    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    /**
     * Load
     */
    public function load(string $pattern): MigrationContainer
    {
        $container = new MigrationContainer();

        $classnames = $this->getHarpy()->search($pattern);

        foreach ($classnames as $classname) {
            $container->addMigration($this->getContainer()->get($classname));
        }

        return $container;
    }
}
