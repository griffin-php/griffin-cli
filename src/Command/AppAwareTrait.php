<?php

declare(strict_types=1);

namespace Griffin\Cli\Command;

use Minicli\App;

/**
 * App Aware
 */
trait AppAwareTrait
{
    protected ?App $app = null;

    /**
     * Configure App
     *
     * @param ?App $app App
     * @return Fluent Interface
     */
    public function setApp(?App $app): self
    {
        $this->app = $app;

        return $this;
    }

    /**
     * Retrieve App
     *
     * @return ?App Expected Object or Null
     */
    public function getApp(): ?App
    {
        return $this->app;
    }
}
