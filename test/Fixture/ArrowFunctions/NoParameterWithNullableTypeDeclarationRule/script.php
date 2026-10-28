<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\ArrowFunctions\NoParameterWithNullableTypeDeclarationRule;

$foo = fn () => null;

$bar = fn ($bar) => $bar;

$baz = fn (string $bar): string => $bar;

$qux = fn (?string $bar) => $bar;

$quux = fn (null|string $bar) => $bar;

$quz = fn (nUlL|string $bar) => $bar;

$corge = fn (\null|string $bar) => $bar;
