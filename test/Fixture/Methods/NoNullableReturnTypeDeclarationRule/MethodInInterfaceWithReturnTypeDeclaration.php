<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule;

interface MethodInInterfaceWithReturnTypeDeclaration
{
    public function toString(): string;
}
