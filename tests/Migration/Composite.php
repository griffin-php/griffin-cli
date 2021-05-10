<?php

declare(strict_types=1);

namespace GriffinTest\Cli\Migration;

use Griffin\Migration\MigrationInterface;

class Composite implements MigrationInterface
{
    protected One $one;

    protected Two $two;

    public function __construct(One $one, Two $two)
    {
        $this->one = $one;
        $this->two = $two;
    }

    public function getName(): string
    {
        return self::class;
    }

    public function getDependencies(): array
    {
        return [];
    }

    public function assert(): bool
    {
        return false;
    }

    public function up(): void
    {
    }

    public function down(): void
    {
    }
}
