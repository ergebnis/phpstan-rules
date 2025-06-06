<?php

namespace Ergebnis\PHPStan\Rules\Test\Fixture\CallLikes\NoNamedArgumentRule;

final class InvokableClass
{
    public function __invoke($bar): void
    {
    }
}
