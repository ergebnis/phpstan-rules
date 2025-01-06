<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule;

trait MethodInTraitWithoutParameters
{
    public function foo(): void
    {
    }
}
