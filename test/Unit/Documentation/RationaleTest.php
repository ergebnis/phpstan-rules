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
 * @covers \Ergebnis\PHPStan\Rules\Documentation\Rationale
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\InvalidRationale
 */
final class RationaleTest extends Framework\TestCase
{
    use Test\Util\Helper;

    /**
     * @dataProvider \Ergebnis\PHPStan\Rules\Test\Util\DataProvider\StringProvider::blank
     */
    public function testFromStringThrowsInvalidRationaleWhenValueIsBlank(string $value): void
    {
        $this->expectException(Documentation\InvalidRationale::class);
        $this->expectExceptionMessage('Value can not be blank.');

        Documentation\Rationale::fromString($value);
    }

    /**
     * @dataProvider \Ergebnis\PHPStan\Rules\Test\Util\DataProvider\StringProvider::withLeadingOrTrailingWhitespace
     */
    public function testFromStringThrowsInvalidRationaleWhenValueHasLeadingOrTrailingWhitespace(string $value): void
    {
        $this->expectException(Documentation\InvalidRationale::class);
        $this->expectExceptionMessage(\sprintf(
            'Value can not have leading or trailing whitespace, got "%s" instead.',
            $value,
        ));

        Documentation\Rationale::fromString($value);
    }

    public function testFromStringReturnsRationaleWhenValueIsNotBlankAndHasNoLeadingOrTrailingWhitespace(): void
    {
        $value = self::faker()->sentence();

        $rationale = Documentation\Rationale::fromString($value);

        self::assertSame($value, $rationale->toString());
    }
}
