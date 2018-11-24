<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Success;

trait MethodInTraitWithParameterWithWronlgyCapitalizedNullDefaultValue
{
    public function foo($bar = NuLl)
    {
        return $bar;
    }
}
