<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Success;

final class MethodInClassWithoutParameters
{
    public function foo(): void
    {
    }
}
