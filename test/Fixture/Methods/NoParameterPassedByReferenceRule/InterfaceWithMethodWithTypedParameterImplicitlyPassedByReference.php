<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterPassedByReferenceRule;

interface InterfaceWithMethodWithTypedParameterImplicitlyPassedByReference
{
    public function foo(Bar $bar);
}
