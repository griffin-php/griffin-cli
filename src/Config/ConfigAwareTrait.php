<?php

declare(strict_types=1);

namespace Griffin\Cli\Config;

/**
 * Config Aware
 */
trait ConfigAwareTrait
{
    /**
     * Config
     */
    protected ?Config $config = null;

    /**
     * Configure Config
     *
     * @param ?Config $config Config
     * @return ConfigAwareTrait Fluent Interface
     */
    public function setConfig(?Config $config): self
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Retrieve Config
     *
     * @return ?Config Expected Object
     */
    public function getConfig(): ?Config
    {
        return $this->config;
    }
}
