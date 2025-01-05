<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule;

trait MethodInTraitWithoutReturnTypeDeclaration
{
    public function toString()
    {
        return 'Hello';
    }
}
