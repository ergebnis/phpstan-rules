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

namespace Ergebnis\PHPStan\Rules\Test\Unit\Documentation;

use Ergebnis\PHPStan\Rules\Documentation;
use Ergebnis\PHPStan\Rules\Test;
use PHPUnit\Framework;

/**
 * @covers \Ergebnis\PHPStan\Rules\Documentation\InvalidTip
 */
final class InvalidTipTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testBlankReturnsInvalidTip(): void
    {
        $exception = Documentation\InvalidTip::blank();

        self::assertSame('Value can not be blank.', $exception->getMessage());
    }

    public function testHasLeadingOrTrailingWhitespaceReturnsInvalidTip(): void
    {
        $value = self::faker()->sentence();

        $exception = Documentation\InvalidTip::hasLeadingOrTrailingWhitespace($value);

        $expected = \sprintf(
            'Value can not have leading or trailing whitespace, got "%s" instead.',
            $value,
        );

        self::assertSame($expected, $exception->getMessage());
    }

    public function testSpansMultipleLinesReturnsInvalidTip(): void
    {
        $value = self::faker()->sentence();

        $exception = Documentation\InvalidTip::spansMultipleLines($value);

        $expected = \sprintf(
            'Value can not span multiple lines, got "%s" instead.',
            $value,
        );

        self::assertSame($expected, $exception->getMessage());
    }

    public function testUsesMarkdownOtherThanInlineCodeReturnsInvalidTip(): void
    {
        $value = self::faker()->sentence();

        $exception = Documentation\InvalidTip::usesMarkdownOtherThanInlineCode($value);

        $expected = \sprintf(
            'Value can not use Markdown other than inline code in backticks, got "%s" instead.',
            $value,
        );

        self::assertSame($expected, $exception->getMessage());
    }
}
