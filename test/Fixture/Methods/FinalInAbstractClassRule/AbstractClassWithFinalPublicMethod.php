<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule;

abstract class AbstractClassWithFinalPublicMethod
{
    final public function method(): void
    {
    }
}
