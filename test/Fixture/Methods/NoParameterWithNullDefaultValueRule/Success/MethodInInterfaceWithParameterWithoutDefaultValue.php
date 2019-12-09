<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Success;

interface MethodInInterfaceWithParameterWithoutDefaultValue
{
    public function foo($bar);
}
