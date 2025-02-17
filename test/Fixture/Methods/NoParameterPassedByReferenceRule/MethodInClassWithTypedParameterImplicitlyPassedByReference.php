<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterPassedByReferenceRule;

final class MethodInClassWithTypedParameterImplicitlyPassedByReference
{
    public function foo(Bar $bar)
    {
        return $bar;
    }
}
