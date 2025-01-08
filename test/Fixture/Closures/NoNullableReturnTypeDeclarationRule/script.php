<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Closures\NoNullableReturnTypeDeclarationRule;

$foo = function () {
    return 'Hello';
};

$bar = function (): string {
    return 'Hello';
};

$baz = function (): ?string {
    return 'Hello';
};

$qux = function (): null|string {
    return 'Hello';
};

$quux = function (): nUlL|string {
    return 'Hello';
};

$quz = function (): \null|string {
    return 'Hello';
};
