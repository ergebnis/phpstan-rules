<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule;

abstract class AbstractClassWithAbstractMethod
{
    abstract public function method(): void;
}
