<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\PropertyHooks\NoReturnByReferenceRule;

$foo = new class() {
    private $foo {
        get {
            return $this->foo;
        }
    }
    private $bar {
        get {
            return $this->bar;
        }
    }
};

$bar = new class() {
    private $foo  {
        get {
            return $this->foo;
        }
    }
    private $bar  {
        &get {
            return $this->bar;
        }
    }
};
