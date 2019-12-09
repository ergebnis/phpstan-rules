<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\Failure;

interface MethodInInterfaceWithNullableReturnTypeDeclaration
{
    public function toString(): ?string;
}
