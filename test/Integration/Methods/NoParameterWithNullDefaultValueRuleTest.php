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

use Ergebnis\PHPStan\Rules\Analyzer;
use Ergebnis\PHPStan\Rules\Methods;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Analyzer
 * @covers \Ergebnis\PHPStan\Rules\Methods\NoParameterWithNullDefaultValueRule
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSample
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSampleList
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ConfigurationKey
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Description
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ErrorTip
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Parameter
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterList
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterName
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Rationale
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Reference
 * @uses \Ergebnis\PHPStan\Rules\Documentation\RuleDefinition
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Tip
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Methods\NoParameterWithNullDefaultValueRule>
 */
final class NoParameterWithNullDefaultValueRuleTest extends Testing\RuleTestCase
{
    use Test\Util\ErrorTip;
    use Test\Util\Helper;

    public function testNoParameterWithNullDefaultValueRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Methods/NoParameterWithNullDefaultValueRule'),
            [
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\ClassWithMethodWithParameterWithNullDefaultValue::class,
                    ),
                    9,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\ClassWithMethodWithParameterWithRootNamespaceReferencedNullDefaultValue::class,
                    ),
                    9,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\ClassWithMethodWithParameterWithWronglyCapitalizedNullDefaultValue::class,
                    ),
                    9,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\InterfaceWithMethodWithParameterWithNullDefaultValue::class,
                    ),
                    9,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\InterfaceWithMethodWithParameterWithRootNamespaceReferencedNullDefaultValue::class,
                    ),
                    9,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar with null as default value.',
                        Test\Fixture\Methods\NoParameterWithNullDefaultValueRule\InterfaceWithMethodWithParameterWithWronglyCapitalizedNullDefaultValue::class,
                    ),
                    9,
                    $this->errorTip(),
                ],
                [
                    'Method foo() in anonymous class has parameter $bar with null as default value.',
                    28,
                    $this->errorTip(),
                ],
                [
                    'Method foo() in anonymous class has parameter $bar with null as default value.',
                    35,
                    $this->errorTip(),
                ],
                [
                    'Method foo() in anonymous class has parameter $bar with null as default value.',
                    42,
                    $this->errorTip(),
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Methods\NoParameterWithNullDefaultValueRule(new Analyzer());
    }
}
