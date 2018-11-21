<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclaration\Success;

interface MethodInInterfaceWithReturnTypeDeclaration
{
    public function toString(): string;
}
