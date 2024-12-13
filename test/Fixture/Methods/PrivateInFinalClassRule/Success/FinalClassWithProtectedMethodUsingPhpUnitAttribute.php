<?php

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule\Success;

use PHPUnit\Framework\Attributes\Before;

final class FinalClassWithProtectedMethodUsingPhpUnitAttribute
{
    #[Before()]
    protected function aMethod(): void
    {
    }
}
