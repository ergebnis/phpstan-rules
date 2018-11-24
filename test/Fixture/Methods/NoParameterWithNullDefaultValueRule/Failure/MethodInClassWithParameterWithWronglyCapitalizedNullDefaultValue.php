<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Failure;

final class MethodInClassWithParameterWithWronglyCapitalizedNullDefaultValue
{
    public function foo($bar = NuLl)
    {
        return $bar;
    }
}
