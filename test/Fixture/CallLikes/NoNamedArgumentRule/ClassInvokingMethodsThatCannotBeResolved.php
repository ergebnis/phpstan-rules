<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\CallLikes\NoNamedArgumentRule;

final class ClassInvokingMethodsThatCannotBeResolved
{
    public function invokingMethodOnUnknownClass(UnknownClass $unknownClass): void
    {
        $unknownClass->bar(baz: 1);
    }

    public function invokingUnknownMethodOnKnownClass(ExampleClass $exampleClass): void
    {
        $exampleClass->unknownMethod(baz: 1);
    }

    /**
     * @param OtherUnknownClass|UnknownClass $unknownClass
     */
    public function invokingMethodOnUnionOfUnknownClasses($unknownClass): void
    {
        $unknownClass->bar(baz: 1);
    }
}
