<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule;

$foo = new class() {
    public function toString()
    {
        return 'Hello';
    }
};

$bar = new class() {
    public function toString(): string
    {
        return 'Hello';
    }
};

$baz = new class() {
    public function toString(): ?string
    {
        return 'Hello';
    }
};

$qux = new class() {
    public function toString(): null|string
    {
        return 'Hello';
    }
};

$quux = new class() {
    public function toString(): nUlL|string
    {
        return 'Hello';
    }
};

$quz = new class() {
    public function toString(): \null|string
    {
        return 'Hello';
    }
};
