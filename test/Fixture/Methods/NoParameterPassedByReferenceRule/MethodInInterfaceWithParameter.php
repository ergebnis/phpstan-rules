<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterPassedByReferenceRule;

interface MethodInInterfaceWithParameter
{
    public function foo($bar);
}
