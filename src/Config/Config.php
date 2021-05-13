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
        foreach ($patterns as $pattern) {
            if (! is_string($pattern)) {
                throw new Exception(
                    sprintf('Invalid Pattern "%s" Type: "%s"', $pattern, gettype($pattern)),
                    Exception::PATTERN_INVALID_TYPE,
                );
            }
        }

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

    /**
     * Load Config using XML
     *
     * @param string $filename File
     * @return Config Fluent Interface
     */
    public function loadFromFile(string $filename): self
    {
        $xml = simplexml_load_file($filename);

        $patterns = [];
        foreach ($xml->pattern as $pattern) {
            $patterns[] = dirname($filename) . DIRECTORY_SEPARATOR . ((string) $pattern);
        }

        $this->setPatterns($patterns);

        return $this;
    }
}
