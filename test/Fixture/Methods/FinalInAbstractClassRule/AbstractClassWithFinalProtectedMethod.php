<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule;

abstract class AbstractClassWithFinalProtectedMethod
{
    final protected function method(): void
    {
    }
}
