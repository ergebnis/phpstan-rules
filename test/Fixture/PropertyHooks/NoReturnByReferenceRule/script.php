<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\PropertyHooks\NoReturnByReferenceRule;

$foo = new class() {
    private array $bar = [];

    public array $foo {
        get {
            return $this->bar;
        }
    }
};

$bar = new class() {
    private array $bar = [];

    public array $foo {
        &get {
            return $this->bar;
        }
    }
};
