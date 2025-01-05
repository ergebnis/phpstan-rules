<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule;

trait MethodInTraitWithParameterWithDefaultValue
{
    public function foo($bar = 'null')
    {
        return $bar;
    }
}
