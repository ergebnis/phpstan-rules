<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule;

interface MethodInInterfaceWithParameterWithNonNullDefaultValue
{
    public function foo($bar = true);
}
