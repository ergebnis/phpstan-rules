<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule;

trait TraitWithMethodWithoutReturnTypeDeclaration
{
    public function toString()
    {
        return 'Hello';
    }
}
