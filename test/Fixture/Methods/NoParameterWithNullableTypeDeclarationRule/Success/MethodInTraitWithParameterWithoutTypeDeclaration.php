<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule\Success;

trait MethodInTraitWithParameterWithoutTypeDeclaration
{
    public function foo($bar)
    {
        return $bar;
    }
}
