<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoConstructorParameterWithDefaultValueRule\Failure;

final class ConstructorInClassWithParameterWithDefaultValue
{
    public function __construct($bar = 9000)
    {
    }
}
