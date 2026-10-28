<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\PropertyHooks\NoReturnByReferenceRule;

trait TraitWithPropertyHooksReturningByReference
{
    private array $bar = [];

    public array $foo {
        &get {
            return $this->bar;
        }
    }
}
