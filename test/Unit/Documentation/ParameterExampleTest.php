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
 * @covers \Ergebnis\PHPStan\Rules\Documentation\ParameterExample
 */
final class ParameterExampleTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testFromBoolReturnsParameterExample(): void
    {
        $value = self::faker()->boolean();

        $parameterExample = Documentation\ParameterExample::fromBool($value);

        self::assertSame($value, $parameterExample->toValue());
    }

    public function testFromStringsReturnsParameterExample(): void
    {
        $faker = self::faker();

        $valueOne = $faker->word();
        $valueTwo = $faker->word();

        $parameterExample = Documentation\ParameterExample::fromStrings(
            $valueOne,
            $valueTwo,
        );

        $expected = [
            $valueOne,
            $valueTwo,
        ];

        self::assertSame($expected, $parameterExample->toValue());
    }

    public function testFromMapsReturnsParameterExample(): void
    {
        $faker = self::faker();

        $mapOne = [
            $faker->word() => $faker->word(),
        ];
        $mapTwo = [
            $faker->word() => $faker->word(),
        ];

        $parameterExample = Documentation\ParameterExample::fromMaps(
            $mapOne,
            $mapTwo,
        );

        $expected = [
            $mapOne,
            $mapTwo,
        ];

        self::assertSame($expected, $parameterExample->toValue());
    }
}
