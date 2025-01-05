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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Closures;

use Ergebnis\PHPStan\Rules\Closures;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Closures\NoParameterWithNullDefaultValueRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Closures\NoParameterWithNullDefaultValueRule>
 */
final class NoParameterWithNullDefaultValueRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoParameterWithNullDefaultValueRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Closures/NoParameterWithNullDefaultValueRule'),
            [
                [
                    'Closure has parameter $bar with null as default value.',
                    18,
                ],
                [
                    'Closure has parameter $bar with null as default value.',
                    22,
                ],
                [
                    'Closure has parameter $bar with null as default value.',
                    26,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Closures\NoParameterWithNullDefaultValueRule();
    }
}
