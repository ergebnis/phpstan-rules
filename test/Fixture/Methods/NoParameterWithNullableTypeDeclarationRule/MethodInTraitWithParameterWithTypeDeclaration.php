<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule;

trait MethodInTraitWithParameterWithTypeDeclaration
{
    public function foo(string $bar)
    {
        return $bar;
    }
}
