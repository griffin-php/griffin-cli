<?php

declare(strict_types=1);

namespace GriffinTest\Cli\Migration;

use Griffin\Migration\MigrationInterface;

class Two implements MigrationInterface
{
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
