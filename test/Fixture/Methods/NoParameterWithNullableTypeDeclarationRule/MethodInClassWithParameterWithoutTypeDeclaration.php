<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule;

final class MethodInClassWithParameterWithoutTypeDeclaration
{
    public function foo($bar)
    {
        return $bar;
    }
}
