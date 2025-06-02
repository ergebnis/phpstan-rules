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
 * @covers \Ergebnis\PHPStan\Rules\Methods\InvokeParentHookMethodRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ClassName
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 * @uses \Ergebnis\PHPStan\Rules\HasContent
 * @uses \Ergebnis\PHPStan\Rules\HookMethod
 * @uses \Ergebnis\PHPStan\Rules\Invocation
 * @uses \Ergebnis\PHPStan\Rules\MethodName
 *
 * @extends Testing\RuleTestCase<Methods\InvokeParentHookMethodRule>
 */
final class InvokeParentHookMethodRuleWithCustomConfigurationTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testInvokeParentHookMethodRuleWithCustomConfiguration(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Methods/InvokeParentHookMethodRule'),
            [
                [
                    \sprintf(
                        'Method %s::_before() does not invoke parent::_before() before all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Cest\ConcreteCestCaseInvokingNonEmptyParentHookMethodsInWrongOrderCestHook::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::_after() does not invoke parent::_after() after all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Cest\ConcreteCestCaseInvokingNonEmptyParentHookMethodsInWrongOrderCestHook::class,
                    ),
                    16,
                ],
                [
                    \sprintf(
                        'Method %s::_before() does not invoke parent::_before().',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Cest\ConcreteCestCaseNotInvokingNonEmptyParentHookMethodsCestHook::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::_after() does not invoke parent::_after().',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Cest\ConcreteCestCaseNotInvokingNonEmptyParentHookMethodsCestHook::class,
                    ),
                    14,
                ],
                [
                    \sprintf(
                        'Method %s::_before() does not invoke parent::_before() before all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test\ConcreteTestCaseInvokingEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    11,
                ],
                [
                    \sprintf(
                        'Method %s::_after() does not invoke parent::_after() after all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test\ConcreteTestCaseInvokingEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    18,
                ],
                [
                    \sprintf(
                        'Method %s::setUp() does not invoke parent::setUp() before all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test\ConcreteTestCaseInvokingNonEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::tearDown() does not invoke parent::tearDown() after all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test\ConcreteTestCaseInvokingNonEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    16,
                ],
                [
                    \sprintf(
                        'Method %s::_setUp() does not invoke parent::_setUp() before all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test\ConcreteTestCaseInvokingNonEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    23,
                ],
                [
                    \sprintf(
                        'Method %s::_tearDown() does not invoke parent::_tearDown() after all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test\ConcreteTestCaseInvokingNonEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    30,
                ],
                [
                    \sprintf(
                        'Method %s::_before() does not invoke parent::_before() before all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test\ConcreteTestCaseInvokingNonEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    37,
                ],
                [
                    \sprintf(
                        'Method %s::_after() does not invoke parent::_after() after all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test\ConcreteTestCaseInvokingNonEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    44,
                ],
                [
                    \sprintf(
                        'Method %s::setUp() does not invoke parent::setUp().',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test\ConcreteTestCaseNotInvokingNonEmptyParentHookMethodsTest::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::tearDown() does not invoke parent::tearDown().',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test\ConcreteTestCaseNotInvokingNonEmptyParentHookMethodsTest::class,
                    ),
                    14,
                ],
                [
                    \sprintf(
                        'Method %s::_tearDown() does not invoke parent::_tearDown().',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test\ConcreteTestCaseNotInvokingNonEmptyParentHookMethodsTest::class,
                    ),
                    24,
                ],
                [
                    \sprintf(
                        'Method %s::_after() does not invoke parent::_after().',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test\ConcreteTestCaseNotInvokingNonEmptyParentHookMethodsTest::class,
                    ),
                    34,
                ],
                [
                    \sprintf(
                        'Method %s::setUpBeforeClass() does not invoke parent::setUpBeforeClass() before all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseInvokingEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    11,
                ],
                [
                    \sprintf(
                        'Method %s::tearDownAfterClass() does not invoke parent::tearDownAfterClass() after all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseInvokingEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    18,
                ],
                [
                    \sprintf(
                        'Method %s::setUp() does not invoke parent::setUp() before all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseInvokingEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    25,
                ],
                [
                    \sprintf(
                        'Method %s::assertPreConditions() does not invoke parent::assertPreConditions() before all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseInvokingEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    32,
                ],
                [
                    \sprintf(
                        'Method %s::assertPostConditions() does not invoke parent::assertPostConditions() after all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseInvokingEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    39,
                ],
                [
                    \sprintf(
                        'Method %s::tearDown() does not invoke parent::tearDown() after all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseInvokingEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    46,
                ],
                [
                    \sprintf(
                        'Method %s::setUpBeforeClass() does not invoke parent::setUpBeforeClass() before all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseInvokingNonEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::tearDownAfterClass() does not invoke parent::tearDownAfterClass() after all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseInvokingNonEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    16,
                ],
                [
                    \sprintf(
                        'Method %s::setUp() does not invoke parent::setUp() before all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseInvokingNonEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    23,
                ],
                [
                    \sprintf(
                        'Method %s::assertPreConditions() does not invoke parent::assertPreConditions() before all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseInvokingNonEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    30,
                ],
                [
                    \sprintf(
                        'Method %s::assertPostConditions() does not invoke parent::assertPostConditions() after all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseInvokingNonEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    37,
                ],
                [
                    \sprintf(
                        'Method %s::tearDown() does not invoke parent::tearDown() after all other statements.',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseInvokingNonEmptyParentHookMethodsInWrongOrderTest::class,
                    ),
                    44,
                ],
                [
                    \sprintf(
                        'Method %s::setUpBeforeClass() does not invoke parent::setUpBeforeClass().',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseNotInvokingNonEmptyParentHookMethodsTest::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::tearDownAfterClass() does not invoke parent::tearDownAfterClass().',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseNotInvokingNonEmptyParentHookMethodsTest::class,
                    ),
                    14,
                ],
                [
                    \sprintf(
                        'Method %s::setUp() does not invoke parent::setUp().',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseNotInvokingNonEmptyParentHookMethodsTest::class,
                    ),
                    19,
                ],
                [
                    \sprintf(
                        'Method %s::assertPreConditions() does not invoke parent::assertPreConditions().',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseNotInvokingNonEmptyParentHookMethodsTest::class,
                    ),
                    24,
                ],
                [
                    \sprintf(
                        'Method %s::assertPostConditions() does not invoke parent::assertPostConditions().',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseNotInvokingNonEmptyParentHookMethodsTest::class,
                    ),
                    29,
                ],
                [
                    \sprintf(
                        'Method %s::tearDown() does not invoke parent::tearDown().',
                        Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework\ConcreteTestCaseNotInvokingNonEmptyParentHookMethodsTest::class,
                    ),
                    34,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Methods\InvokeParentHookMethodRule(
            self::createReflectionProvider(),
            [
                [
                    'className' => Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Cest\AbstractCestCaseWithEmptyHookMethods::class,
                    'hasContent' => 'no',
                    'invocation' => 'first',
                    'methodName' => '_before',
                ],
                [
                    'className' => Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Cest\AbstractCestCaseWithEmptyHookMethods::class,
                    'hasContent' => 'no',
                    'invocation' => 'last',
                    'methodName' => '_after',
                ],
                [
                    'className' => Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Cest\AbstractCestCaseWithNonEmptyHookMethods::class,
                    'hasContent' => 'yes',
                    'invocation' => 'first',
                    'methodName' => '_before',
                ],
                [
                    'className' => Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Cest\AbstractCestCaseWithNonEmptyHookMethods::class,
                    'hasContent' => 'yes',
                    'invocation' => 'last',
                    'methodName' => '_after',
                ],
            ],
        );
    }
}
