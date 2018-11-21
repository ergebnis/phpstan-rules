<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclaration;

final class MethodInAnonymousClassWithReturnTypeDeclaration
{
    public function foo()
    {
        return new class() {
            public function toString(): string
            {
                return 'Hello';
            }
        };
    }
}
