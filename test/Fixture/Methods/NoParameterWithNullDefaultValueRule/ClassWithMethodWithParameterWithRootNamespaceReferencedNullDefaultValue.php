<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule;

final class ClassWithMethodWithParameterWithRootNamespaceReferencedNullDefaultValue
{
    public function foo($bar = \null)
    {
        return $bar;
    }
}
