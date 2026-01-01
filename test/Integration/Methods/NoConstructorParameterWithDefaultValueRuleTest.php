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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Methods;

use Ergebnis\PHPStan\Rules\Methods;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Methods\NoConstructorParameterWithDefaultValueRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Methods\NoConstructorParameterWithDefaultValueRule>
 */
final class NoConstructorParameterWithDefaultValueRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoConstructorParameterWithDefaultValueRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Methods/NoConstructorParameterWithDefaultValueRule'),
            [
                [
                    \sprintf(
                        'Constructor in %s has parameter $bar with default value.',
                        Test\Fixture\Methods\NoConstructorParameterWithDefaultValueRule\ClassWithConstructorWithParameterWithDefaultValue::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Constructor in %s has parameter $bar with default value.',
                        Test\Fixture\Methods\NoConstructorParameterWithDefaultValueRule\ClassWithConstructorWithWrongCapitalizationWithParameterWithDefaultValue::class,
                    ),
                    9,
                ],
                [
                    'Constructor in anonymous class has parameter $bar with default value.',
                    26,
                ],
                [
                    'Constructor in anonymous class has parameter $bar with default value.',
                    32,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Methods\NoConstructorParameterWithDefaultValueRule();
    }
}
