<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoConstructorParameterWithDefaultValueRule;

final class ConstructorInClassWithParameterWithDefaultValue
{
    public function __construct($bar = 9000)
    {
    }
}
