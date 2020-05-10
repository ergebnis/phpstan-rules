<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\PHPUnit\Framework\TestCaseWithSuffixRule\Success;

use PHPUnit\Framework;

/**
 * @internal
 *
 * @coversNothing
 */
final class ConcreteTestCaseWithSuffixTest extends Framework\TestCase
{
    public function testFooIsNotBar(): void
    {
        self::assertNotSame('bar', 'foo');
    }
}
