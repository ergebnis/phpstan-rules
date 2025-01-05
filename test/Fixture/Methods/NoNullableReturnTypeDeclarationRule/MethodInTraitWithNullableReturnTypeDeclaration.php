<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule;

trait MethodInTraitWithNullableReturnTypeDeclaration
{
    public function toString(): ?string
    {
        return 'Hello';
    }
}
