<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclaration\Success;

trait MethodInTraitWithoutReturnTypeDeclaration
{
    public function toString()
    {
        return 'Hello';
    }
}
