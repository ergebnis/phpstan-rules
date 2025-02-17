<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoReturnByReferenceRule;

$foo = new class() {
    public function foo(): void
    {
    }
};

$bar = new class() {
    public function foo($bar)
    {
        return $bar;
    }
};

$baz = new class() {
    public function &foo($bar)
    {
        return $bar;
    }
};
