<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule;

class ClassWithProtectedMethod
{
    protected function method(): void
    {
    }
}
