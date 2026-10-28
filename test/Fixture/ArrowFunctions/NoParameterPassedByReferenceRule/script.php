<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\ArrowFunctions\NoParameterPassedByReferenceRule;

$foo = fn () => null;

$bar = fn ($bar) => $bar;

$baz = fn (Bar $bar) => $bar;

$qux = fn (Bar &$bar) => $bar;

$quux = fn (&$bar) => $bar;
