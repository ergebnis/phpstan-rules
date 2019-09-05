<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Expressions\NoCompactRule\Failure;

use function compact as compress;

$foo = 9000;
$bar = 42;

return compress(
    'foo',
    'bar'
);
