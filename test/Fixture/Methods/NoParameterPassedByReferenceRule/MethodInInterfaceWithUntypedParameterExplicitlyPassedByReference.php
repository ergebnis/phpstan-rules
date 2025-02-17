<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterPassedByReferenceRule;

interface MethodInInterfaceWithUntypedParameterExplicitlyPassedByReference
{
    public function foo(&$bar);
}
