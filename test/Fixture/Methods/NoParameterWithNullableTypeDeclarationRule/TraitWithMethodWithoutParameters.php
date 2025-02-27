<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule;

trait TraitWithMethodWithoutParameters
{
    public function foo(): void
    {
    }
}
