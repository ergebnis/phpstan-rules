<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2025 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Unit;

use Ergebnis\PHPStan\Rules\HasContent;
use Ergebnis\PHPStan\Rules\Test;
use PHPUnit\Framework;

/**
 * @covers \Ergebnis\PHPStan\Rules\HasContent
 */
final class HasContentTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testMaybeReturnsHasContent(): void
    {
        $hasContent = HasContent::maybe();

        self::assertSame('maybe', $hasContent->toString());
    }

    public function testNoReturnsHasContent(): void
    {
        $hasContent = HasContent::no();

        self::assertSame('no', $hasContent->toString());
    }

    public function testYesReturnsHasContent(): void
    {
        $hasContent = HasContent::yes();

        self::assertSame('yes', $hasContent->toString());
    }

    public function testFromStringRejectsUnknownValue(): void
    {
        $value = self::faker()->slug();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(\sprintf(
            'Value needs to be one of "maybe", "no", "yes", got "%s" instead.',
            $value,
        ));

        HasContent::fromString($value);
    }

    /**
     * @dataProvider provideValue
     */
    public function testFromStringReturnsOrder(string $value): void
    {
        $order = HasContent::fromString($value);

        self::assertSame($value, $order->toString());
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function provideValue(): iterable
    {
        $values = [
            'maybe',
            'no',
            'yes',
        ];

        foreach ($values as $value) {
            yield $value => [
                $value,
            ];
        }
    }

    public function testEqualsReturnsFalseWhenValuesAreDifferent(): void
    {
        $one = HasContent::yes();
        $two = HasContent::no();

        self::assertFalse($one->equals($two));
    }

    public function testEqualsReturnsTrueWhenValueIsSame(): void
    {
        $one = HasContent::maybe();
        $two = HasContent::maybe();

        self::assertTrue($one->equals($two));
    }
}
