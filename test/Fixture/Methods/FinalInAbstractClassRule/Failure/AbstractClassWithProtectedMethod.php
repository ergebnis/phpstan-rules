<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule\Failure;

abstract class AbstractClassWithProtectedMethod
{
    protected function method(): void
    {
    }
}
