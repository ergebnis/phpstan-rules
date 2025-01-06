<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule;

interface MethodInInterfaceWithParameterWithoutTypeDeclaration
{
    public function foo($bar);
}
