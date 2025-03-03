<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule;

$foo = new class() {
    protected function method(): void
    {
    }
};

$bar = new class() {
    use TraitWithProtectedMethod;
};

$baz = new class() {
    use TraitWithProtectedMethod;

    protected function method(): void
    {
    }
};

$qux = new class() {
    use TraitWithAbstractProtectedMethod;

    protected function method(): void
    {
    }
};
