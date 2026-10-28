<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\ArrowFunctions\NoParameterWithNullDefaultValueRule;

$foo = fn () => null;

$bar = fn ($bar) => $bar;

$baz = fn ($bar = true) => $bar;

$qux = fn ($bar = null) => $bar;

$quux = fn ($bar = nUlL) => $bar;

$quz = fn ($bar = \null) => $bar;
