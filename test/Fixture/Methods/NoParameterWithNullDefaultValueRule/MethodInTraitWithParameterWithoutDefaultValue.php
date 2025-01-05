<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule;

trait MethodInTraitWithParameterWithoutDefaultValue
{
    public function foo($bar)
    {
        return $bar;
    }
}
