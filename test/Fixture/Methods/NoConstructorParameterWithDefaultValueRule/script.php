<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoConstructorParameterWithDefaultValueRule;

$foo = new class() {
    public function foo($bar = null): void
    {
    }
};

$bar = new class() {
    public function __construct()
    {
    }
};

$baz = new class() {
    public function __construct($bar)
    {
    }
};

$qux = new class() {
    public function __construct($bar = 9000)
    {
    }
};

$quux = new class() {
    public function __CoNsTrUcT($bar = 9000)
    {
    }
};
