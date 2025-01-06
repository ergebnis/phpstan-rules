<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoConstructorParameterWithDefaultValueRule;

final class ConstructorInClassWithParameterWithoutDefaultValue
{
    public function __construct($bar)
    {
    }
}
