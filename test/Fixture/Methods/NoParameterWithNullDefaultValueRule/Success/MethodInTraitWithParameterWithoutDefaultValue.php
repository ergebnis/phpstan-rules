<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Success;

trait MethodInTraitWithParameterWithoutDefaultValue
{
    public function foo($bar)
    {
        return $bar;
    }
}
