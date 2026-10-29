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
 * @covers \Ergebnis\PHPStan\Rules\Documentation\InvalidParameterName
 */
final class InvalidParameterNameTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testNotCamelCasedReturnsInvalidParameterName(): void
    {
        $value = self::faker()->sentence();

        $exception = Documentation\InvalidParameterName::notCamelCased($value);

        $expected = \sprintf(
            'Value needs to be a camel-cased key, got "%s" instead.',
            $value,
        );

        self::assertSame($expected, $exception->getMessage());
    }
}
