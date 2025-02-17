<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterPassedByReferenceRule;

interface MethodInInterfaceWithTypedParameterExplicitlyPassedByReference
{
    public function foo(Bar &$bar);
}
