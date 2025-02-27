<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoReturnByReferenceRule;

interface InterfaceWithMethodReturningByReference
{
    public function &foo($bar);
}
