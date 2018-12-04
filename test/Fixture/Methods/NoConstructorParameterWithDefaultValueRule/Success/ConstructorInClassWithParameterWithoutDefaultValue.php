<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoConstructorParameterWithDefaultValueRule\Success;

final class ConstructorInClassWithParameterWithoutDefaultValue
{
    public function __construct($bar)
    {
    }
}
