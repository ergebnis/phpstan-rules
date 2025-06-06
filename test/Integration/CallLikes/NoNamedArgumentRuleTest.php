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

namespace Ergebnis\PHPStan\Rules\Test\Integration\CallLikes;

use Ergebnis\PHPStan\Rules\CallLikes;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\CallLikes\NoNamedArgumentRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<CallLikes\NoNamedArgumentRule>
 */
final class NoNamedArgumentRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoNamedArgumentRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/CallLikes/NoNamedArgumentRule'),
            [
                [
                    'Function json_encode() is invoked with named argument for parameter $value.',
                    8,
                ],
                [
                    'Function json_encode() is invoked with named argument for parameter $value.',
                    9,
                ],
                [
                    'Function foo() is invoked with named argument for parameter $bar.',
                    17,
                ],
                [
                    'Callable referenced by $bar is invoked with named argument for parameter $baz.',
                    26,
                ],
                [
                    \sprintf(
                        'Constructor of %s is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClass::class,
                    ),
                    31,
                ],
                [
                    \sprintf(
                        'Method %s::create() is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClass::class,
                    ),
                    34,
                ],
                [
                    \sprintf(
                        'Method %s::bar() is invoked with named argument for parameter $baz.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClass::class,
                    ),
                    39,
                ],
                [
                    \sprintf(
                        'Constructor of %s is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassExtendingAbstractClass::class,
                    ),
                    43,
                ],
                [
                    \sprintf(
                        'Method %s::create() is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassExtendingAbstractClass::class,
                    ),
                    46,
                ],
                [
                    \sprintf(
                        'Method %s::bar() is invoked with named argument for parameter $baz.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassExtendingAbstractClass::class,
                    ),
                    51,
                ],
                [
                    \sprintf(
                        'Constructor of %s is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassExtendingAbstractClassAndImplementingExampleInterface::class,
                    ),
                    55,
                ],
                [
                    \sprintf(
                        'Method %s::create() is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassExtendingAbstractClassAndImplementingExampleInterface::class,
                    ),
                    58,
                ],
                [
                    \sprintf(
                        'Method %s::bar() is invoked with named argument for parameter $baz.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassExtendingAbstractClassAndImplementingExampleInterface::class,
                    ),
                    63,
                ],
                [
                    \sprintf(
                        'Constructor of %s is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassImplementingExampleInterface::class,
                    ),
                    67,
                ],
                [
                    \sprintf(
                        'Method %s::create() is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassImplementingExampleInterface::class,
                    ),
                    70,
                ],
                [
                    \sprintf(
                        'Method %s::bar() is invoked with named argument for parameter $baz.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassImplementingExampleInterface::class,
                    ),
                    75,
                ],
                [
                    \sprintf(
                        'Constructor of %s is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\OtherExampleClassExtendingExampleClass::class,
                    ),
                    79,
                ],
                [
                    \sprintf(
                        'Method %s::create() is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\OtherExampleClassExtendingExampleClass::class,
                    ),
                    82,
                ],
                [
                    \sprintf(
                        'Method %s::bar() is invoked with named argument for parameter $baz.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClass::class,
                    ),
                    87,
                ],
                [
                    \sprintf(
                        'Constructor of %s is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\OtherExampleClassExtendingExampleClassExtendingAbstractClassAndImplementingExampleInterface::class,
                    ),
                    91,
                ],
                [
                    \sprintf(
                        'Method %s::create() is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\OtherExampleClassExtendingExampleClassExtendingAbstractClassAndImplementingExampleInterface::class,
                    ),
                    94,
                ],
                [
                    \sprintf(
                        'Method %s::bar() is invoked with named argument for parameter $baz.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassExtendingAbstractClassAndImplementingExampleInterface::class,
                    ),
                    99,
                ],
                [
                    'Method bar() of anonymous class is invoked with named argument for parameter $baz.',
                    116,
                ],
                [
                    'Method create() is invoked with named argument for parameter $bar.',
                    119,
                ],
                [
                    'Method create() is invoked with named argument for parameter $bar.',
                    122,
                ],
                [
                    'Callable referenced by $invokableClass is invoked with named argument for parameter $bar.',
                    127,
                ],
                [
                    'Callable referenced by $staticClassMethodCallable is invoked with named argument for parameter $bar.',
                    135,
                ],
                [
                    'Callable referenced by $dynamicClassMethodCallable is invoked with named argument for parameter $bar.',
                    143,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new CallLikes\NoNamedArgumentRule();
    }
}
