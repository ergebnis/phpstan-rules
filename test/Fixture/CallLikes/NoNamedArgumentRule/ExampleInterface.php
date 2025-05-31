<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\CallLikes\NoNamedArgumentRule;

interface ExampleInterface
{
    public function __construct($bar = null);

    public function bar($baz, $qux): void;

    public static function create($bar = null): self;
}
