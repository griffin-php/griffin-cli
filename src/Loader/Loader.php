<?php

declare(strict_types=1);

namespace Griffin\Cli\Loader;

use Griffin\Harpy\Harpy;

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
}
