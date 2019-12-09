<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\Success;

final class MethodInClassWithoutReturnTypeDeclaration
{
    public function toString()
    {
        return 'Hello';
    }
}
