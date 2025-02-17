<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Closures\NoParameterPassedByReferenceRule;

$foo = function (): void {
};

$bar = function ($bar) {
    return $bar;
};

$baz = function (Bar $bar) {
    return $bar;
};

$qux = function (Bar &$bar) {
    return $bar;
};

$quux = function (&$bar) {
    return $bar;
};
