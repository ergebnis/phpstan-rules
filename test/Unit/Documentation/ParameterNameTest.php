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
 * @covers \Ergebnis\PHPStan\Rules\Documentation\ParameterName
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\InvalidParameterName
 */
final class ParameterNameTest extends Framework\TestCase
{
    use Test\Util\Helper;

    /**
     * @dataProvider provideValueThatIsNotCamelCased
     */
    public function testFromStringThrowsInvalidParameterNameWhenValueIsNotCamelCased(string $value): void
    {
        $this->expectException(Documentation\InvalidParameterName::class);
        $this->expectExceptionMessage(\sprintf(
            'Value needs to be a camel-cased key, got "%s" instead.',
            $value,
        ));

        Documentation\ParameterName::fromString($value);
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function provideValueThatIsNotCamelCased(): iterable
    {
        $values = [
            'empty' => '',
            'kebab-cased' => 'hook-methods',
            'pascal-cased' => 'HookMethods',
            'snake-cased' => 'hook_methods',
            'starts-with-digit' => '1hookMethods',
            'with-dot' => 'noExtends.hookMethods',
            'with-whitespace' => 'hook Methods',
        ];

        foreach ($values as $key => $value) {
            yield $key => [
                $value,
            ];
        }
    }

    /**
     * @dataProvider provideValueThatIsCamelCased
     */
    public function testFromStringReturnsParameterNameWhenValueIsCamelCased(string $value): void
    {
        $parameterName = Documentation\ParameterName::fromString($value);

        self::assertSame($value, $parameterName->toString());
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function provideValueThatIsCamelCased(): iterable
    {
        $values = [
            'one-word' => 'enabled',
            'several-words' => 'classesAllowedToBeExtended',
            'with-digit' => 'allowPhp8Features',
        ];

        foreach ($values as $key => $value) {
            yield $key => [
                $value,
            ];
        }
    }
}
