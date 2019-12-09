<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\Success;

interface MethodInInterfaceWithoutReturnTypeDeclaration
{
    public function toString();
}
