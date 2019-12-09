<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Failure;

interface MethodInInterfaceWithParameterWithWronlgyCapitalizedNullDefaultValue
{
    public function foo($bar = NuLl);
}
