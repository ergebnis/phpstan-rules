<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\PropertyHooks\NoParameterWithNullableTypeDeclarationRule;

trait TraitWithPropertyHooksWithParameterWithNullableTypeDeclaration
{
    public string $foo {
        set(?string $value) {
            $this->foo = (string) $value;
        }
    }
}
