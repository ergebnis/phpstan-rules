<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Success;

interface MethodInInterfaceWithParameterWithNonNullDefaultValue
{
    public function foo($bar = true);
}
