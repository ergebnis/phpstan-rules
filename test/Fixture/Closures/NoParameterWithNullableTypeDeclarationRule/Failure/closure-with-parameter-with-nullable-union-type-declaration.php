<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Closures\NoParameterWithNullDefaultValueRule\Failure;

$foo = function (null|string $bar) {
    return $bar;
};
