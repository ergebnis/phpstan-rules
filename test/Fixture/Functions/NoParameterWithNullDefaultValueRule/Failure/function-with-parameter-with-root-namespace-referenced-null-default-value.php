<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Functions\NoParameterWithNullDefaultValueRule\Failure;

function foo($bar = \null)
{
    return $bar;
}
