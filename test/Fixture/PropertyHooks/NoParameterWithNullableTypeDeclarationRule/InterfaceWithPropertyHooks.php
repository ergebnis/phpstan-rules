<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\PropertyHooks\NoParameterWithNullableTypeDeclarationRule;

interface InterfaceWithPropertyHooks
{
    public string $foo {
        set(string $value);
    }
}
