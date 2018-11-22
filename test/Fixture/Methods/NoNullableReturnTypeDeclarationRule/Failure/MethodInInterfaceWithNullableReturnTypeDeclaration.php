<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\Failure;

interface MethodInInterfaceWithNullableReturnTypeDeclaration
{
    public function toString(): ?string;
}
