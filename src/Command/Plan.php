<?php

declare(strict_types=1);

namespace Griffin\Cli\Command;

use Griffin\Cli\Loader\Loader;
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

    public function __invoke(CommandCall $arguments): void
    {
        $pattern = $arguments->getParam('pattern');
    }
}
