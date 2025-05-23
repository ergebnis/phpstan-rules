<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\FunctionCalls\NoNamedArgumentRule;

use Doctrine\DBAL\Schema\Identifier;

function foo($bar = null)
{
}

function bar(...$baz)
{
}
foo();

foo(2000);

foo(bar: 2000);

foo(...);

bar();

bar(2000, 3000);

bar(baz: 2000);

bar(...);

