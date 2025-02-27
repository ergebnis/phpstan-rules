<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule;

final class ClassWithMethodWithoutReturnTypeDeclaration
{
    public function toString()
    {
        return 'Hello';
    }
}
