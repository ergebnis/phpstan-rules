<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoConstructorParameterWithDefaultValueRule;

trait TraitWithMethodWithParameterWithDefaultValue
{
    public function foo($bar = 9000): void
    {
    }
}
