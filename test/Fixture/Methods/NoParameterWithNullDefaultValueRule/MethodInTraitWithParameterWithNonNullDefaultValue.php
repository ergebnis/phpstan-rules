<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule;

trait MethodInTraitWithParameterWithNonNullDefaultValue
{
    public function foo($bar = true)
    {
        return $bar;
    }
}
