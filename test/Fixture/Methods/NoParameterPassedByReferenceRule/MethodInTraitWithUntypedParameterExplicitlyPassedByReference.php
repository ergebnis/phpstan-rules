<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterPassedByReferenceRule;

trait MethodInTraitWithUntypedParameterExplicitlyPassedByReference
{
    public function foo(&$bar)
    {
        return $bar;
    }
}
