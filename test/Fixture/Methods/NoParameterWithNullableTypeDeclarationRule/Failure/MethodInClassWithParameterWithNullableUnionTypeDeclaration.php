<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\Failure;

final class MethodInClassWithParameterWithNullableUnionTypeDeclaration
{
    public function foo(null|string $bar)
    {
        return $bar;
    }
}
