<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\Failure;

final class MethodInAnonymousClassWithNullableReturnTypeDeclaration
{
    public function foo()
    {
        return new class() {
            public function toString(): null|string
            {
                return 'Hello';
            }
        };
    }
}
