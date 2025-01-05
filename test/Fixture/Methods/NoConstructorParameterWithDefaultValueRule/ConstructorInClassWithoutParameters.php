<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoConstructorParameterWithDefaultValueRule;

final class ConstructorInClassWithoutParameters
{
    public function __construct()
    {
    }
}
