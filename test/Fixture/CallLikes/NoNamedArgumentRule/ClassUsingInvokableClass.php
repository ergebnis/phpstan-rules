<?php

namespace Ergebnis\PHPStan\Rules\Test\Fixture\CallLikes\NoNamedArgumentRule;

final class ClassUsingInvokableClass
{
    private InvokableClass $invokableClass;

    public function __construct(InvokableClass $invokableClass)
    {
        $this->invokableClass = $invokableClass;
    }

    public function bar($baz): void
    {
        ($this->invokableClass)($baz);
        ($this->invokableClass)(bar: $baz);
    }

    public function baz(): InvokableClass
    {
        return $this->invokableClass;
    }
}
