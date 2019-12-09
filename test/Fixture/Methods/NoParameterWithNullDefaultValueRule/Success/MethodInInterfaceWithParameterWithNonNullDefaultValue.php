<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Success;

interface MethodInInterfaceWithParameterWithNonNullDefaultValue
{
    public function foo($bar = true);
}
