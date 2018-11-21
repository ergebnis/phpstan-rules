<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclaration;

final class MethodInClassWithNullableReturnTypeDeclaration
{
    public function toString(): ?string
    {
        return 'Hello';
    }
}
