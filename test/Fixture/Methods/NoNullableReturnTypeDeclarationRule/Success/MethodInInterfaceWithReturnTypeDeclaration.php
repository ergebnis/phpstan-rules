<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\Success;

interface MethodInInterfaceWithReturnTypeDeclaration
{
    public function toString(): string;
}
