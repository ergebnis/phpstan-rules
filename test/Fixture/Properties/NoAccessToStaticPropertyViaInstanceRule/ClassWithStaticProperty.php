<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Properties\NoAccessToStaticPropertyViaInstanceRule;

class ClassWithStaticProperty
{
    public static string $BAR = 'bar';

    public function baz(): void
    {
        $this::$BAR;
    }
}
