<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\PHPUnit\Framework\TestCaseWithSuffixRule\Success;

use PHPUnit\Framework;

#[Framework\Attributes\CoversNothing]
class ImplicitlyAbstractTestCase extends Framework\TestCase
{
    abstract protected function foo();
}
