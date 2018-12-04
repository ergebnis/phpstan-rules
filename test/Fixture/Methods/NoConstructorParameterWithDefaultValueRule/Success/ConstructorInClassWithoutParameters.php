<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoConstructorParameterWithDefaultValueRule\Success;

final class ConstructorInClassWithoutParameters
{
    public function __construct()
    {
    }
}
