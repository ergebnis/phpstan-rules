<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\PHPUnit\Framework\TestCaseWithSuffixRule\Failure;

use PHPUnit\Framework;

final class ConcreteTestCaseWithoutTestSuffix extends Framework\TestCase
{
    public function testFooIsNotBar(): void
    {
        self::assertNotSame('bar', 'foo');
    }
}
