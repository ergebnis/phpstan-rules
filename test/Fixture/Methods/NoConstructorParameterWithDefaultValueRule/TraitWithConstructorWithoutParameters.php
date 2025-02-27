<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoConstructorParameterWithDefaultValueRule;

trait TraitWithConstructorWithoutParameters
{
    public function __construct()
    {
    }
}
