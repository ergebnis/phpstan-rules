<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\Failure;

final class MethodInClassWithNullableReturnTypeDeclaration
{
    public function toString(): ?string
    {
        return 'Hello';
    }
}
