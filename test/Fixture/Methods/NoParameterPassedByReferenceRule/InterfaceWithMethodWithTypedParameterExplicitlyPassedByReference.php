<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterPassedByReferenceRule;

interface InterfaceWithMethodWithTypedParameterExplicitlyPassedByReference
{
    public function foo(Bar &$bar);
}
