<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule\Success;

final class FinalClassWithProtectedMethodExtendingClassWithSameProtectedMethod extends AbstractClassWithProtectedMethod
{
    protected function method(): void
    {
    }
}
