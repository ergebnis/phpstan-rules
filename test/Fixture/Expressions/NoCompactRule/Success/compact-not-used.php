<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Expressions\NoEmptyRule\Success;

function _compact(string ...$names): array
{
    return $names;
}

$foo = 9000;
$bar = 42;

return _compact(
    'foo',
    'bar'
);
