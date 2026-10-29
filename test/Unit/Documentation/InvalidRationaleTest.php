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
 * @covers \Ergebnis\PHPStan\Rules\Documentation\InvalidRationale
 */
final class InvalidRationaleTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testBlankReturnsInvalidRationale(): void
    {
        $exception = Documentation\InvalidRationale::blank();

        self::assertSame('Value can not be blank.', $exception->getMessage());
    }

    public function testHasLeadingOrTrailingWhitespaceReturnsInvalidRationale(): void
    {
        $value = self::faker()->sentence();

        $exception = Documentation\InvalidRationale::hasLeadingOrTrailingWhitespace($value);

        $expected = \sprintf(
            'Value can not have leading or trailing whitespace, got "%s" instead.',
            $value,
        );

        self::assertSame($expected, $exception->getMessage());
    }
}
