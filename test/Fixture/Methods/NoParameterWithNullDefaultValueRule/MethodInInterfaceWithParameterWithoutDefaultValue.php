<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule;

interface MethodInInterfaceWithParameterWithoutDefaultValue
{
    public function foo($bar);
}
