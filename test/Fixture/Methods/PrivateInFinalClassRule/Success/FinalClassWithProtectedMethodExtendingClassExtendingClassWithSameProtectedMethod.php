<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule\Success;

final class FinalClassWithProtectedMethodExtendingClassExtendingClassWithSameProtectedMethod extends AbstractClassExtendingAbstractClassWithProtectedMethod
{
    protected function method(): void
    {
    }
}
