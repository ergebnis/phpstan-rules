<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoAccessToStaticMethodViaInstanceRule;

$anonymous = new class() {
    public static function bar(): string
    {
        return 'bar';
    }

    public function baz(): void
    {
        self::bar();
        self::bar();
        $this::bar();
    }
};

$anonymous::bar();
