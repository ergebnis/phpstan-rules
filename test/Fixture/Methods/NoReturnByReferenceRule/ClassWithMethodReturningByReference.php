<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoReturnByReferenceRule;

final class ClassWithMethodReturningByReference
{
    public function &foo($bar)
    {
        return $bar;
    }
}
