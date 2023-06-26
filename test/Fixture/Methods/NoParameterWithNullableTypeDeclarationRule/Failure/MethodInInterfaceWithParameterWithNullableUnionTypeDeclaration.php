<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\Failure;

interface MethodInInterfaceWithParameterWithNullableUnionTypeDeclaration
{
    public function foo(null|string $bar);
}
