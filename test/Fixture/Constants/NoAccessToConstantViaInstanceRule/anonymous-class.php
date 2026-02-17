<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Constants\NoAccessToConstantViaInstanceRule;

$anonymous = new class() {
    public const BAZ = 'baz';

    public function qux(): void
    {
        self::BAZ;
        self::BAZ;
        $this::BAZ;
    }
};

$anonymous::BAZ;
