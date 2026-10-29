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
 * @covers \Ergebnis\PHPStan\Rules\Documentation\Parameter
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Description
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterName
 */
final class ParameterTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testCreateReturnsParameter(): void
    {
        $faker = self::faker();

        $name = Documentation\ParameterName::fromString($faker->word());
        $description = Documentation\Description::fromString($faker->sentence());
        $example = [
            $faker->word(),
            $faker->word(),
        ];

        $parameter = Documentation\Parameter::create(
            $name,
            $description,
            $example,
        );

        self::assertSame($name, $parameter->name());
        self::assertSame($description, $parameter->description());
        self::assertSame($example, $parameter->example());
    }
}
