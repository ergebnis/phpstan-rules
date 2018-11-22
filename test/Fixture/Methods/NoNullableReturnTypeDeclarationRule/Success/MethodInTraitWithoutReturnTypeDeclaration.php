<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\Success;

trait MethodInTraitWithoutReturnTypeDeclaration
{
    public function toString()
    {
        return 'Hello';
    }
}
