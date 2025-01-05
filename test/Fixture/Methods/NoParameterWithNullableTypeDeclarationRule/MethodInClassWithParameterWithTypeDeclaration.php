<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule;

final class MethodInClassWithParameterWithTypeDeclaration
{
    public function foo(string $bar)
    {
        return $bar;
    }
}
