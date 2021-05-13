<?php

declare(strict_types=1);

namespace Griffin\Cli\Command;

use Griffin\Cli\Config\Config;
use Griffin\Cli\Config\ConfigAwareTrait;
use Griffin\Cli\Loader\Loader;
use Griffin\Planner\Planner;
use Minicli\App;
use Minicli\Command\CommandCall;

/**
 * Migrate Command
 */
class Migrate
{
    use AppAwareTrait;
    use ConfigAwareTrait;

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

    public function __invoke(CommandCall $call): void
    {
        $loader  = new Loader();
        $printer = $this->getApp()->getPrinter();

        $patterns = $this->getConfig()->getPatterns();

        if (! $patterns) {
            return;
        }

        $planner    = new Planner($loader->load(...$this->getConfig()->getPatterns()));
        $migrations = $call->command === 'up' ? $planner->up() : $planner->down();

        foreach ($migrations as $migration) {
            $printer->rawOutput($migration->getName() . "\n");
        }
    }
}
