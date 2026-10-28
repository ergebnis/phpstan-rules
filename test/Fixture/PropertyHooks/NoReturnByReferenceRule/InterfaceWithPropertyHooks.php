<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\PropertyHooks\NoReturnByReferenceRule;

interface InterfaceWithPropertyHooks
{
    public array $foo {
        get;
    }
}
