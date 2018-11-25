<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\Failure;

final class MethodInClassWithParameterWithNullableTypeDeclaration
{
    public function foo(?string $bar)
    {
        return $bar;
    }
}
