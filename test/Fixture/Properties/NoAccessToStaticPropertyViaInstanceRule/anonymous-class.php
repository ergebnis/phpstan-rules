<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Properties\NoAccessToStaticPropertyViaInstanceRule;

$anonymous = new class() {
    public static string $BAR = 'bar';

    public function baz(): void
    {
        self::$BAR;
        self::$BAR;
        $this::$BAR;
    }
};

$anonymous::$BAR;
