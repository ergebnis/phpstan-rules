<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\Success;

final class MethodInClassWithParameterWithTypeDeclaration
{
    public function foo(string $bar)
    {
        return $bar;
    }
}
