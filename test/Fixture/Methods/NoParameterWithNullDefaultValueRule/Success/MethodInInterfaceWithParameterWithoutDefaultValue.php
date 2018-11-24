<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Success;

interface MethodInInterfaceWithParameterWithoutDefaultValue
{
    public function foo($bar);
}
