<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoParameterWithNullDefaultValueRule\Failure;

function foo($bar = nUlL)
{
    return $bar;
}
