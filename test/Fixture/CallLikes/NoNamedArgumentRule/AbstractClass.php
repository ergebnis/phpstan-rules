<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\CallLikes\NoNamedArgumentRule;

abstract class AbstractClass
{
    abstract public function __construct($bar = null);

    abstract public function bar($baz, $qux): void;

    abstract public static function create($bar = null): self;
}
