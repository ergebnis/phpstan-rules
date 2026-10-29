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
 * @covers \Ergebnis\PHPStan\Rules\Documentation\CodeSampleList
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSample
 */
final class CodeSampleListTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testCreateReturnsCodeSampleListWhenNoCodeSamplesAreGiven(): void
    {
        $codeSampleList = Documentation\CodeSampleList::create();

        self::assertSame([], $codeSampleList->toArray());
    }

    public function testCreateReturnsCodeSampleListWhenCodeSamplesAreGiven(): void
    {
        $faker = self::faker();

        $codeSampleOne = Documentation\CodeSample::reported($faker->sentence());
        $codeSampleTwo = Documentation\CodeSample::notReported($faker->sentence());

        $codeSampleList = Documentation\CodeSampleList::create(
            $codeSampleOne,
            $codeSampleTwo,
        );

        $expected = [
            $codeSampleOne,
            $codeSampleTwo,
        ];

        self::assertSame($expected, $codeSampleList->toArray());
    }
}
