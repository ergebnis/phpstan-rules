<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule;

final class MethodInClassWithParameterWithNullableTypeDeclaration
{
    public function foo(?string $bar)
    {
        return $bar;
    }
}
