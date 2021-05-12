<?php

declare(strict_types=1);

namespace Griffin\Cli\Command;

use Griffin\Cli\Config\Config;
use Griffin\Cli\Loader\Loader;
use Griffin\Planner\Planner;
use Minicli\App;
use Minicli\Command\CommandCall;

/**
 * Plan Command
 */
class Plan
{
    use AppAwareTrait;

    /**
     * Config
     */
    protected Config $config;

    /**
     * Constructor
     *
     * @param App $app App
     * @param Config $config Config
     */
    public function __construct(App $app, Config $config)
    {
        $this
            ->setApp($app)
            ->setConfig($config);
    }

    /**
     * Configure Config
     *
     * @param Config $config Config
     * @return Plan Fluent Interface
     */
    public function setConfig(Config $config): self
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Retrieve Config
     *
     * @return Config Expected Object
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    public function __invoke(CommandCall $call): void
    {
        $arguments = $call->args;

        array_shift($arguments); // bin
        array_shift($arguments); // plan
        array_shift($arguments); // up|down

        $loader  = new Loader();
        $printer = $this->getApp()->getPrinter();

        $planner    = new Planner($loader->load(...$this->getConfig()->getPatterns()));
        $migrations = $call->subcommand === 'up' ? $planner->up() : $planner->down();

        foreach ($migrations as $migration) {
            $printer->rawOutput($migration->getName() . "\n");
        }
    }
}
