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

use Ergebnis\PHPStan\Rules\Invocation;
use Ergebnis\PHPStan\Rules\Test;
use PHPUnit\Framework;

/**
 * @covers \Ergebnis\PHPStan\Rules\Invocation
 */
final class InvocationTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testAnyReturnsInvocation(): void
    {
        $invocation = Invocation::any();

        self::assertSame('any', $invocation->toString());
    }

    public function testFirstReturnsOrder(): void
    {
        $invocation = Invocation::first();

        self::assertSame('first', $invocation->toString());
    }

    public function testLastReturnsInvocation(): void
    {
        $invocation = Invocation::last();

        self::assertSame('last', $invocation->toString());
    }

    public function testNeverReturnsInvocation(): void
    {
        $invocation = Invocation::never();

        self::assertSame('never', $invocation->toString());
    }

    public function testFromStringRejectsUnknownValue(): void
    {
        $value = self::faker()->slug();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(\sprintf(
            'Value needs to be one of "any", "first", "last", "never", got "%s" instead.',
            $value,
        ));

        Invocation::fromString($value);
    }

    /**
     * @dataProvider provideValue
     */
    public function testFromStringReturnsOrder(string $value): void
    {
        $order = Invocation::fromString($value);

        self::assertSame($value, $order->toString());
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function provideValue(): iterable
    {
        $values = [
            'any',
            'first',
            'last',
            'never',
        ];

        foreach ($values as $value) {
            yield $value => [
                $value,
            ];
        }
    }

    public function testEqualsReturnsFalseWhenValuesAreDifferent(): void
    {
        $one = Invocation::any();
        $two = Invocation::last();

        self::assertFalse($one->equals($two));
    }

    /**
     * @dataProvider provideValue
     */
    public function testEqualsReturnsTrueWhenValueIsSame(string $value): void
    {
        $one = Invocation::fromString($value);
        $two = Invocation::fromString($value);

        self::assertTrue($one->equals($two));
    }
}
