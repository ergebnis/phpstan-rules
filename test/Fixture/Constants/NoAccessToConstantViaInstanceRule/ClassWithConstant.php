<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Constants\NoAccessToConstantViaInstanceRule;

class ClassWithConstant
{
    public const BAZ = 'baz';

    public function qux(): void
    {
        $this::BAZ;
    }
}
