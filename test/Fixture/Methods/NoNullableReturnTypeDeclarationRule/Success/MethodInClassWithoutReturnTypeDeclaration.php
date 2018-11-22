<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\Success;

final class MethodInClassWithoutReturnTypeDeclaration
{
    public function toString()
    {
        return 'Hello';
    }
}
