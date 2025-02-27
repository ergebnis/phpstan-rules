<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule;

trait TraitWithMethodWithoutParameters
{
    public function foo(): void
    {
    }
}
