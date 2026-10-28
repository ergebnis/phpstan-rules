<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\PropertyHooks\NoParameterWithNullableTypeDeclarationRule;

trait TraitWithPropertyHooks
{
    public string $foo {
        set(string $value) {
            $this->foo = $value;
        }
    }
}
