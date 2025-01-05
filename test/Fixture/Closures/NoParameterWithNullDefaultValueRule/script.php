<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Closures\NoParameterWithNullDefaultValueRule;

$foo = function (): void {
};

$bar = function ($bar) {
    return $bar;
};

$baz = function ($bar = true) {
    return $bar;
};

$qux = function ($bar = null) {
    return $bar;
};

$quux = function ($bar = \null) {
    return $bar;
};

$quz = function ($bar = NuLl) {
    return $bar;
};
