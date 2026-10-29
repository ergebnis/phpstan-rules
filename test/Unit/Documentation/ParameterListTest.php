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
 * @covers \Ergebnis\PHPStan\Rules\Documentation\ParameterList
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Description
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Parameter
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterExample
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterName
 */
final class ParameterListTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testCreateReturnsParameterListWhenNoParametersAreGiven(): void
    {
        $parameterList = Documentation\ParameterList::create();

        self::assertSame([], $parameterList->toArray());
    }

    public function testCreateReturnsParameterListWhenParametersAreGiven(): void
    {
        $faker = self::faker();

        $parameterOne = Documentation\Parameter::create(
            Documentation\ParameterName::fromString($faker->word()),
            Documentation\Description::fromString($faker->sentence()),
            Documentation\ParameterExample::fromBool($faker->boolean()),
        );
        $parameterTwo = Documentation\Parameter::create(
            Documentation\ParameterName::fromString($faker->word()),
            Documentation\Description::fromString($faker->sentence()),
            Documentation\ParameterExample::fromStrings($faker->word()),
        );

        $parameterList = Documentation\ParameterList::create(
            $parameterOne,
            $parameterTwo,
        );

        $expected = [
            $parameterOne,
            $parameterTwo,
        ];

        self::assertSame($expected, $parameterList->toArray());
    }
}
