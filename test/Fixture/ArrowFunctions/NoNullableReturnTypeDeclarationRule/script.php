<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\ArrowFunctions\NoNullableReturnTypeDeclarationRule;

$foo = fn () => 'Hello';

$bar = fn (): string => 'Hello';

$baz = fn (): ?string => 'Hello';

$qux = fn (): null|string => 'Hello';

$quux = fn (): nUlL|string => 'Hello';

$quz = fn (): \null|string => 'Hello';
