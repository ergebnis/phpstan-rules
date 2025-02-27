<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule;

final class ClassWithMethodWithReturnTypeDeclaration
{
    public function toString(): string
    {
        return 'Hello';
    }
}
