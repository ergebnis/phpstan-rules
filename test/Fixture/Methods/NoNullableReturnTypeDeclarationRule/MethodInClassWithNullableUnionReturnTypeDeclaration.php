<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule;

final class MethodInClassWithNullableUnionReturnTypeDeclaration
{
    public function toString(): null|string
    {
        return 'Hello';
    }
}
