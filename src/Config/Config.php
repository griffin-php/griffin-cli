<?php

declare(strict_types=1);

namespace Griffin\Cli\Config;

/**
 * Config
 */
class Config
{
    /**
     * Patterns
     * @var string[]
     */
    protected array $patterns = [];

    /**
     * Configure Patterns
     *
     * @param string[] $patterns Patterns
     * @return Config Fluent Interface
     */
    public function setPatterns(array $patterns): self
    {
        $this->patterns = $patterns;

        return $this;
    }

    /**
     * Retrieve Patterns
     *
     * @return string[] Expected Values
     */
    public function getPatterns(): array
    {
        return $this->patterns;
    }
}
