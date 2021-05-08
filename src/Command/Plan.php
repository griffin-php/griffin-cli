<?php

declare(strict_types=1);

namespace Griffin\Cli\Command;

use Minicli\App;

/**
 * Plan Command
 */
class Plan
{
    /**
     * App
     */
    protected App $app;

    /**
     * Constructor
     *
     * @param App $app App
     */
    public function __construct(App $app)
    {
        $this->app = $app;
    }

    /**
     * Retrieve App
     *
     * @return App Expected Object
     */
    public function getApp(): App
    {
        return $this->app;
    }

    public function __invoke(): void
    {
    }
}
