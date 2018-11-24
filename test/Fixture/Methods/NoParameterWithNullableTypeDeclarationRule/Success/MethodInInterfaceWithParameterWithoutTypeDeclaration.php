<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\Success;

interface MethodInInterfaceWithParameterWithoutTypeDeclaration
{
    public function foo($bar);
}
