<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\Success;

interface MethodInInterfaceWithParameterWithoutTypeDeclaration
{
    public function foo($bar);
}
