<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\Failure;

interface MethodInInterfaceWithParameterWithNullableTypeDeclaration
{
    public function foo(?string $bar);
}
