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

use Ergebnis\PHPStan\Rules\ClassName;
use PHPUnit\Framework;

/**
 * @covers \Ergebnis\PHPStan\Rules\ClassName
 */
final class ClassNameTest extends Framework\TestCase
{
    public function testFromStringReturnsClassName(): void
    {
        $value = self::class;

        $className = ClassName::fromString($value);

        self::assertSame($value, $className->toString());
    }

    public function testEqualsReturnsFalseWhenValuesAreDifferent(): void
    {
        $one = ClassName::fromString(self::class);
        $two = ClassName::fromString(Framework\TestCase::class);

        self::assertFalse($one->equals($two));
    }

    public function testEqualsReturnsTrueWhenValueIsSame(): void
    {
        $value = self::class;

        $one = ClassName::fromString($value);
        $two = ClassName::fromString($value);

        self::assertTrue($one->equals($two));
    }
}
