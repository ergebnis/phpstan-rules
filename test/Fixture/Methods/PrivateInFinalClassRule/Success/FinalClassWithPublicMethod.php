<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule\Success;

final class FinalClassWithPublicMethod
{
    public function method(): void
    {
    }
}
