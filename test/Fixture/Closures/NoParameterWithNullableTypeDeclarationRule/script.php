<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Closures\NoParameterWithNullDefaultValueRule;

$foo = function (): void {
};

$bar = function ($bar) {
    return $bar;
};

$baz = function (string $bar): string {
    return $bar;
};

$qux = function (?string $bar) {
    return $bar;
};

$quux = function (null|string $bar) {
    return $bar;
};

$quz = function (nUlL|string $bar) {
    return $bar;
};

$corge = function (\null|string $bar) {
    return $bar;
};
