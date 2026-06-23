<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoAccessToStaticMethodViaInstanceRule;

class ClassWithStaticMethod
{
    public static function bar(): string
    {
        return 'bar';
    }

    public function baz(): void
    {
        $this::bar();
    }
}
