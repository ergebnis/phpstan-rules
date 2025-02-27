<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule;

trait TraitWithMethodWithParameterWithDefaultValue
{
    public function foo($bar = 'null')
    {
        return $bar;
    }
}
