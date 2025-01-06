<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithContainerTypeDeclarationRule;

final class ClassWithMethodWithoutParameter
{
    public function method(): void
    {
    }
}
