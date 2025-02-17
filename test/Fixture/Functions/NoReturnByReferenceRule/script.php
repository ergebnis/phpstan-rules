<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoReturnByReferenceRule;

function foo(): void
{
}

function &bar($bar)
{
    return $bar;
}
