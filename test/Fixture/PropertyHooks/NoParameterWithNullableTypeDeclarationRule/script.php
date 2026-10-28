<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\PropertyHooks\NoParameterWithNullableTypeDeclarationRule;

$foo = new class() {
    public string $foo {
        set(string $value) {
            $this->foo = $value;
        }
    }
};

$bar = new class() {
    public string $foo {
        set(?string $value) {
            $this->foo = (string) $value;
        }
    }
};
