<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Expressions\NoCompactRule;

use function compact as compress;

function _compact(string ...$names): array
{
    return $names;
}

$foo = 9000;
$bar = 42;

$baz = _compact(
    'foo',
    'bar',
);

$qux = \compact(
    'foo',
    'bar',
);

$quux = cOmPaCt(
    'foo',
    'bar',
);

$quz = compress(
    'foo',
    'bar',
);
