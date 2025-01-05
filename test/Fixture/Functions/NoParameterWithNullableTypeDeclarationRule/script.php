<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoParameterWithNullableTypeDeclarationRule;

function foo()
{
}

function bar($bar)
{
    return $bar;
}

function baz(string $bar)
{
    return $bar;
}

function qux(?string $bar)
{
    return $bar;
}

function quux(null|string $bar)
{
    return $bar;
}
