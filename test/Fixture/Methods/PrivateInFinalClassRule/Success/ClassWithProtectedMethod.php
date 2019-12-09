<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule\Success;

class ClassWithProtectedMethod
{
    protected function method(): void
    {
    }
}
