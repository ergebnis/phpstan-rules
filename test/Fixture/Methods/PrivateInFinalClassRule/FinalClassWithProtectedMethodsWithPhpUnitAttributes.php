<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule;

use PHPUnit\Framework;

final class FinalClassWithProtectedMethodsWithPhpUnitAttributes extends Framework\TestCase
{
    #[Framework\Attributes\After()]
    protected function methodWithAfterAttribute(): void
    {
    }

    #[Framework\Attributes\Before()]
    protected function methodWithBeforeAttribute(): void
    {
    }

    #[Framework\Attributes\PreCondition()]
    protected function methodWithPreConditionAttribute(): void
    {
    }

    #[Framework\Attributes\PostCondition()]
    protected function methodWithPostConditionAttribute(): void
    {
    }
}
