<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullableTypeDeclarationRule;

final class ClassWithMethodWithoutParameters
{
    public function foo(): void
    {
    }
}
