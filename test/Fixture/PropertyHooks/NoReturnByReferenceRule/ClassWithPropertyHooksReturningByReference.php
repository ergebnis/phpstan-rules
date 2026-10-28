<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\PropertyHooks\NoReturnByReferenceRule;

final class ClassWithPropertyHooksReturningByReference
{
    private array $bar = [];

    public array $foo {
        &get {
            return $this->bar;
        }
    }

    public function __construct(
        public array $baz = [] {
            &get {
                return $this->baz;
            }
        },
    ) {
    }
}
