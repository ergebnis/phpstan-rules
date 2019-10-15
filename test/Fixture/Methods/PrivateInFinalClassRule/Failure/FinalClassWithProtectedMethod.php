<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule\Failure;

final class FinalClassWithProtectedMethod
{
    protected function method(): void
    {
    }
}
