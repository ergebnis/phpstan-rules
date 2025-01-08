<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterWithNullDefaultValueRule;

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
    public function foo($bar = true)
    {
        return $bar;
    }
};

$qux = new class() {
    public function foo($bar = null)
    {
        return $bar;
    }
};

$quux = new class() {
    public function foo($bar = nUlL)
    {
        return $bar;
    }
};

$quz = new class() {
    public function foo($bar = \null)
    {
        return $bar;
    }
};
