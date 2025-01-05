<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoConstructorParameterWithDefaultValueRule;

final class ConstructorWithWrongCapitalizationInClassWithParameterWithDefaultValue
{
    public function __CoNsTrUcT($bar = 9000)
    {
    }
}
