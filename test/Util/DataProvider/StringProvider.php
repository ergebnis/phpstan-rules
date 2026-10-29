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

namespace Ergebnis\PHPStan\Rules\Test\Util\DataProvider;

use Ergebnis\PHPStan\Rules\Test;

final class StringProvider
{
    use Test\Util\Helper;

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function blank(): iterable
    {
        $values = [
            'empty' => '',
            'whitespace' => " \t\n",
        ];

        foreach ($values as $key => $value) {
            yield $key => [
                $value,
            ];
        }
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function withLeadingOrTrailingWhitespace(): iterable
    {
        $value = self::faker()->sentence();

        $values = [
            'leading-space' => \sprintf(
                ' %s',
                $value,
            ),
            'trailing-line-feed' => \sprintf(
                "%s\n",
                $value,
            ),
        ];

        foreach ($values as $key => $value) {
            yield $key => [
                $value,
            ];
        }
    }
}
