<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule;

final class MethodInClassWithReturnTypeDeclaration
{
    public function toString(): string
    {
        return 'Hello';
    }
}
