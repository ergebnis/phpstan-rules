<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2026 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Unit;

use Ergebnis\PHPStan\Rules\MethodName;
use PHPUnit\Framework;

/**
 * @covers \Ergebnis\PHPStan\Rules\MethodName
 */
final class MethodNameTest extends Framework\TestCase
{
    public function testFromStringReturnsMethodName(): void
    {
        $value = __FUNCTION__;

        $methodName = MethodName::fromString($value);

        self::assertSame($value, $methodName->toString());
    }

    public function testEqualsReturnsFalseWhenValuesAreDifferent(): void
    {
        $one = MethodName::fromString(__FUNCTION__);
        $two = MethodName::fromString('tearDown');

        self::assertFalse($one->equals($two));
    }

    public function testEqualsReturnsTrueWhenValueIsSame(): void
    {
        $value = __FUNCTION__;

        $one = MethodName::fromString($value);
        $two = MethodName::fromString($value);

        self::assertTrue($one->equals($two));
    }
}
