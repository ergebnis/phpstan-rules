<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule;

abstract class AbstractClassWithPublicMethod
{
    public function method(): void
    {
    }
}
