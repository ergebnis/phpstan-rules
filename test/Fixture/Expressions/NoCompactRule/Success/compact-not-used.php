<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Expressions\NoCompactRule\Success;

function _compact(string ...$names): array
{
    return $names;
}

$foo = 9000;
$bar = 42;

return _compact(
    'foo',
    'bar',
);
