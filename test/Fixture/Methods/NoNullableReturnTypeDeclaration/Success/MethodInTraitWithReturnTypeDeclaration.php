<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclaration\Success;

trait MethodInTraitWithReturnTypeDeclaration
{
    public function toString(): string
    {
        return 'Hello';
    }
}
