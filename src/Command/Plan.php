<?php

declare(strict_types=1);

namespace Griffin\Cli\Command;

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
     * Constructor
     *
     * @param App $app App
     */
    public function __construct(App $app)
    {
        $this->setApp($app);
    }

    public function __invoke(CommandCall $call): void
    {
        $arguments = $call->args;

        array_shift($arguments); // bin
        array_shift($arguments); // plan

        $loader  = new Loader();
        $printer = $this->getApp()->getPrinter();

        $planner    = new Planner($loader->load(...$arguments));
        $migrations = $planner->up();

        foreach ($migrations as $migration) {
            $printer->rawOutput($migration->getName() . "\n");
        }
    }
}
