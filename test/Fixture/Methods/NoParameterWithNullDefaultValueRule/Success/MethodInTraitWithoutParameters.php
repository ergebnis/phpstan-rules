<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\Success;

trait MethodInTraitWithoutParameters
{
    public function foo()
    {
    }
}
