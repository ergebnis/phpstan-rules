<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule\Success;

final class FinalClassWithProtectedMethodExtendingClassExtendingClassWithSameProtectedMethod extends AbstractClassExtendingAbstractClassWithProtectedMethod
{
    protected function method(): void
    {
    }
}
