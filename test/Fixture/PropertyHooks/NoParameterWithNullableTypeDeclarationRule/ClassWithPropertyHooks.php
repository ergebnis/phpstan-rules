<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\PropertyHooks\NoParameterWithNullableTypeDeclarationRule;

final class ClassWithPropertyHooks
{
    public string $qux = '';

    public string $foo {
        set {
            $this->foo = $value;
        }
    }

    public string $bar {
        set(string $value) {
            $this->bar = $value;
        }
    }

    public function __construct(
        public string $baz = '' {
            set(string $value) {
                $this->baz = $value;
            }
        },
    ) {
    }
}
