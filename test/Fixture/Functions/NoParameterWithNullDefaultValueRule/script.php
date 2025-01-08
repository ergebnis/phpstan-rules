<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoParameterWithNullDefaultValueRule;

function foo(): void
{
}

function bar($bar)
{
    return $bar;
}

function baz($bar = true)
{
    return $bar;
}

function qux($bar = null)
{
    return $bar;
}

function quux($bar = nUlL)
{
    return $bar;
}

function quz($bar = \null)
{
    return $bar;
}
