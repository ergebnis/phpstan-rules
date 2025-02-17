<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoParameterPassedByReferenceRule;

function foo(): void
{
}

function bar(Bar $bar)
{
    return $bar;
}

function baz(Bar &$bar)
{
    return $bar;
}

function qux(&$bar)
{
    return $bar;
}
