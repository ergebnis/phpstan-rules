<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoConstructorParameterWithDefaultValueRule\Success;

trait ConstructorInTraitWithParameterWithoutDefaultValue
{
    public function __construct($bar)
    {
    }
}
