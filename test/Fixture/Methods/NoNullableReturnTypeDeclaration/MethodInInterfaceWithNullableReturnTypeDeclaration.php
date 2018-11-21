<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclaration;

interface MethodInInterfaceWithNullableReturnTypeDeclaration
{
    public function toString(): ?string;
}
