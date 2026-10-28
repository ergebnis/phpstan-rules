<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\PropertyHooks\NoParameterWithNullableTypeDeclarationRule;

final class ClassWithPropertyHooksWithParameterWithNullableTypeDeclaration
{
    public string $foo {
        set(?string $value) {
            $this->foo = (string) $value;
        }
    }

    public string $bar {
        set(null|string $value) {
            $this->bar = (string) $value;
        }
    }

    public ?string $baz {
        set(?string $value) {
            $this->baz = $value;
        }
    }

    public function __construct(
        public string $qux = '' {
            set(?string $value) {
                $this->qux = (string) $value;
            }
        },
    ) {
    }
}
