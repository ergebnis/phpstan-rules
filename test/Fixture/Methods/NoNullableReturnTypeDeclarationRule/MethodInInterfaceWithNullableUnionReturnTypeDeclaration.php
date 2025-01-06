<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule;

interface MethodInInterfaceWithNullableUnionReturnTypeDeclaration
{
    public function toString(): null|string;
}