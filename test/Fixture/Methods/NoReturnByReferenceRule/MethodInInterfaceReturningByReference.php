<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoReturnByReferenceRule;

interface MethodInInterfaceReturningByReference
{
    public function &foo($bar);
}
