<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule;

interface InterfaceWithMethodWithReturnTypeDeclaration
{
    public function toString(): string;
}
