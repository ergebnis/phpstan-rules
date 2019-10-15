<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule\Success;

final class FinalClassWithProtectedMethodExtendingClassWithSameProtectedMethod extends AbstractClassWithProtectedMethod
{
    protected function method(): void
    {
    }
}
