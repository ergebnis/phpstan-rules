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
 * @covers \Ergebnis\PHPStan\Rules\Documentation\Description
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\InvalidDescription
 */
final class DescriptionTest extends Framework\TestCase
{
    use Test\Util\Helper;

    /**
     * @dataProvider \Ergebnis\PHPStan\Rules\Test\Util\DataProvider\StringProvider::blank
     */
    public function testFromStringThrowsInvalidDescriptionWhenValueIsBlank(string $value): void
    {
        $this->expectException(Documentation\InvalidDescription::class);
        $this->expectExceptionMessage('Value can not be blank.');

        Documentation\Description::fromString($value);
    }

    /**
     * @dataProvider \Ergebnis\PHPStan\Rules\Test\Util\DataProvider\StringProvider::withLeadingOrTrailingWhitespace
     */
    public function testFromStringThrowsInvalidDescriptionWhenValueHasLeadingOrTrailingWhitespace(string $value): void
    {
        $this->expectException(Documentation\InvalidDescription::class);
        $this->expectExceptionMessage(\sprintf(
            'Value can not have leading or trailing whitespace, got "%s" instead.',
            $value,
        ));

        Documentation\Description::fromString($value);
    }

    public function testFromStringReturnsDescriptionWhenValueIsNotBlankAndHasNoLeadingOrTrailingWhitespace(): void
    {
        $value = self::faker()->sentence();

        $description = Documentation\Description::fromString($value);

        self::assertSame($value, $description->toString());
    }
}
