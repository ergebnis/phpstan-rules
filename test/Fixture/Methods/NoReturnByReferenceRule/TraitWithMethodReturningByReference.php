<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoReturnByReferenceRule;

trait TraitWithMethodReturningByReference
{
    public function &foo($bar)
    {
        return $bar;
    }
}
