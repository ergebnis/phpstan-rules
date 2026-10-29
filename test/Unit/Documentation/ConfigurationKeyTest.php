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
 * @covers \Ergebnis\PHPStan\Rules\Documentation\ConfigurationKey
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\InvalidConfigurationKey
 */
final class ConfigurationKeyTest extends Framework\TestCase
{
    use Test\Util\Helper;

    /**
     * @dataProvider provideValueThatIsNotCamelCased
     */
    public function testFromStringThrowsInvalidConfigurationKeyWhenValueIsNotCamelCased(string $value): void
    {
        $this->expectException(Documentation\InvalidConfigurationKey::class);
        $this->expectExceptionMessage(\sprintf(
            'Value needs to be a camel-cased key, got "%s" instead.',
            $value,
        ));

        Documentation\ConfigurationKey::fromString($value);
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function provideValueThatIsNotCamelCased(): iterable
    {
        $values = [
            'empty' => '',
            'kebab-cased' => 'no-extends',
            'pascal-cased' => 'NoExtends',
            'snake-cased' => 'no_extends',
            'starts-with-digit' => '1noExtends',
            'with-dot' => 'ergebnis.noExtends',
            'with-whitespace' => 'no Extends',
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
    public function testFromStringReturnsConfigurationKeyWhenValueIsCamelCased(string $value): void
    {
        $configurationKey = Documentation\ConfigurationKey::fromString($value);

        self::assertSame($value, $configurationKey->toString());
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function provideValueThatIsCamelCased(): iterable
    {
        $values = [
            'one-word' => 'final',
            'several-words' => 'noParameterWithNullableTypeDeclaration',
            'with-digit' => 'noPhp8Feature',
        ];

        foreach ($values as $key => $value) {
            yield $key => [
                $value,
            ];
        }
    }
}
