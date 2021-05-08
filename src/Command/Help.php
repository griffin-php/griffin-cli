<?php

declare(strict_types=1);

namespace Griffin\Cli\Command;

use Minicli\App;

/**
 * Help Command
 */
class Help
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

    public function __invoke(): void
    {
    }
}
