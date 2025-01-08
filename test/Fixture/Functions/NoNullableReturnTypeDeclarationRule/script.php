<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoNullableReturnTypeDeclarationRule;

function foo()
{
    return 'Hello';
}

function bar(): string
{
    return 'Hello';
}

function baz(): ?string
{
    return 'Hello';
}

function quux(): null|string
{
    return 'Hello';
}

function quz(): nUlL|string
{
    return 'Hello';
}

function corge(): \null|string
{
    return 'Hello';
}
