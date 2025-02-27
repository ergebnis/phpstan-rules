<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule;

interface InterfaceWithMethodWithParameterWithNullableUnionTypeDeclaration
{
    public function foo(null|string $bar);
}
