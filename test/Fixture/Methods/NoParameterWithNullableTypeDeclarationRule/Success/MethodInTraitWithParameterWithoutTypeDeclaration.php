<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\Success;

trait MethodInTraitWithParameterWithoutTypeDeclaration
{
    public function foo($bar)
    {
        return $bar;
    }
}
