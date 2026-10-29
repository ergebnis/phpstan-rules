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
 * @covers \Ergebnis\PHPStan\Rules\Documentation\Tip
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\InvalidTip
 */
final class TipTest extends Framework\TestCase
{
    use Test\Util\Helper;

    /**
     * @dataProvider \Ergebnis\PHPStan\Rules\Test\Util\DataProvider\StringProvider::blank
     */
    public function testFromStringThrowsInvalidTipWhenValueIsBlank(string $value): void
    {
        $this->expectException(Documentation\InvalidTip::class);
        $this->expectExceptionMessage('Value can not be blank.');

        Documentation\Tip::fromString($value);
    }

    /**
     * @dataProvider \Ergebnis\PHPStan\Rules\Test\Util\DataProvider\StringProvider::withLeadingOrTrailingWhitespace
     */
    public function testFromStringThrowsInvalidTipWhenValueHasLeadingOrTrailingWhitespace(string $value): void
    {
        $this->expectException(Documentation\InvalidTip::class);
        $this->expectExceptionMessage(\sprintf(
            'Value can not have leading or trailing whitespace, got "%s" instead.',
            $value,
        ));

        Documentation\Tip::fromString($value);
    }

    public function testFromStringThrowsInvalidTipWhenValueSpansMultipleLines(): void
    {
        $faker = self::faker();

        $value = \sprintf(
            "%s\n%s",
            $faker->sentence(),
            $faker->sentence(),
        );

        $this->expectException(Documentation\InvalidTip::class);
        $this->expectExceptionMessage(\sprintf(
            'Value can not span multiple lines, got "%s" instead.',
            $value,
        ));

        Documentation\Tip::fromString($value);
    }

    /**
     * @dataProvider provideValueWithMarkdownOtherThanInlineCode
     */
    public function testFromStringThrowsInvalidTipWhenValueUsesMarkdownOtherThanInlineCode(string $value): void
    {
        $this->expectException(Documentation\InvalidTip::class);
        $this->expectExceptionMessage(\sprintf(
            'Value can not use Markdown other than inline code in backticks, got "%s" instead.',
            $value,
        ));

        Documentation\Tip::fromString($value);
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function provideValueWithMarkdownOtherThanInlineCode(): iterable
    {
        $values = [
            'emphasis-with-asterisks' => 'Declare the class *final* instead.',
            'emphasis-with-underscores' => 'Declare the class _final_ instead.',
            'html' => 'Declare the class <code>final</code> instead.',
            'link' => 'Read the [documentation](https://example.com) instead.',
            'unbalanced-backtick' => 'Declare the class `final instead.',
        ];

        foreach ($values as $key => $value) {
            yield $key => [
                $value,
            ];
        }
    }

    /**
     * @dataProvider provideValueAndPlainText
     */
    public function testFromStringReturnsTipWhenValueUsesNoMarkdownOtherThanInlineCode(
        string $value,
        string $plainText
    ): void {
        $tip = Documentation\Tip::fromString($value);

        self::assertSame($value, $tip->toString());
        self::assertSame($plainText, $tip->toPlainText());
    }

    /**
     * @return \Generator<string, array{0: string, 1: string}>
     */
    public static function provideValueAndPlainText(): iterable
    {
        $values = [
            'inline-code' => [
                'Add a `declare(strict_types=1)` declaration at the top of the file.',
                'Add a declare(strict_types=1) declaration at the top of the file.',
            ],
            'plain-text' => [
                'Return the new value instead.',
                'Return the new value instead.',
            ],
        ];

        foreach ($values as $key => [$value, $plainText]) {
            yield $key => [
                $value,
                $plainText,
            ];
        }
    }
}
