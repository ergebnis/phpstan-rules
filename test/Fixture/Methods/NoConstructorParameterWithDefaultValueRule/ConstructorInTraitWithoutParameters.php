<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoConstructorParameterWithDefaultValueRule;

trait ConstructorInTraitWithoutParameters
{
    public function __construct()
    {
    }
}
