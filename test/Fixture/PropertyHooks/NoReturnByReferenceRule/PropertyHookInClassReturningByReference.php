<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\PropertyHooks\NoReturnByReferenceRule;

final class PropertyHookInClassReturningByReference
{
    private $foo {
        get {
            return $this->foo;
        }
    }
    private $bar {
        &get {
            return $this->bar;
        }
    }
}
