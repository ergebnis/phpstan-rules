<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterPassedByReferenceRule;

interface InterfaceWithMethodWithUntypedParameterExplicitlyPassedByReference
{
    public function foo(&$bar);
}
