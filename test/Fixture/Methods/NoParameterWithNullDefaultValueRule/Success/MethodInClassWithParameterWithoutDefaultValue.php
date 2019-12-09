<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Success;

final class MethodInClassWithParameterWithoutDefaultValue
{
    public function foo($bar)
    {
        return $bar;
    }
}
