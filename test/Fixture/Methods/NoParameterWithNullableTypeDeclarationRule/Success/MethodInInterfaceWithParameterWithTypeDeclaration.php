<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\Success;

interface MethodInInterfaceWithParameterWithTypeDeclaration
{
    public function foo(string $bar);
}
