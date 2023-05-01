<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Closures\NoParameterWithNullDefaultValueRule\Success;

$foo = function (string|null $bar) {
    return $bar;
};
