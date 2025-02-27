<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule;

trait TraitWithMethodWithReturnTypeDeclaration
{
    public function toString(): string
    {
        return 'Hello';
    }
}
