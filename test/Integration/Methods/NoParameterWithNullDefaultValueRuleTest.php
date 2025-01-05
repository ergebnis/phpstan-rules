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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Methods;

use Ergebnis\PHPStan\Rules\Methods;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Methods\NoParameterWithNullDefaultValueRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Methods\NoParameterWithNullDefaultValueRule>
 */
final class NoParameterWithNullDefaultValueRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoParameterWithNullDefaultValueRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule'),
            [
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\MethodInClassWithParameterWithNullDefaultValue::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\MethodInClassWithParameterWithRootNamespaceReferencedNullDefaultValue::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\MethodInClassWithParameterWithWronglyCapitalizedNullDefaultValue::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\MethodInInterfaceWithParameterWithNullDefaultValue::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\MethodInInterfaceWithParameterWithRootNamespaceReferencedNullDefaultValue::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\MethodInInterfaceWithParameterWithWronlgyCapitalizedNullDefaultValue::class,
                    ),
                    9,
                ],
                [
                    'Method foo() in anonymous class has parameter $bar with null as default value.',
                    28,
                ],
                [
                    'Method foo() in anonymous class has parameter $bar with null as default value.',
                    35,
                ],
                [
                    'Method foo() in anonymous class has parameter $bar with null as default value.',
                    42,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Methods\NoParameterWithNullDefaultValueRule();
    }
}
