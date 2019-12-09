<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule\Success;

abstract class AbstractClassWithProtectedMethod
{
    protected function method(): void
    {
    }
}
