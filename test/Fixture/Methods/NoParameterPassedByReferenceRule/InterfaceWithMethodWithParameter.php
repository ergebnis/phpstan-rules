<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoParameterPassedByReferenceRule;

interface InterfaceWithMethodWithParameter
{
    public function foo($bar);
}
