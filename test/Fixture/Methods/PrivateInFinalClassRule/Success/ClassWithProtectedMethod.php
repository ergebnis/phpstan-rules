<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule\Success;

class ClassWithProtectedMethod
{
    protected function method(): void
    {
    }
}
