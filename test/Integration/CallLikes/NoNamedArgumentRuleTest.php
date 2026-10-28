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

namespace Ergebnis\PHPStan\Rules\Test\Integration\CallLikes;

use Ergebnis\PHPStan\Rules\CallLikes;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\CallLikes\NoNamedArgumentRule
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ErrorTip
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Parameter
 * @uses \Ergebnis\PHPStan\Rules\Documentation\RuleDefinition
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<CallLikes\NoNamedArgumentRule>
 */
final class NoNamedArgumentRuleTest extends Testing\RuleTestCase
{
    use Test\Util\ErrorTip;
    use Test\Util\Helper;

    public function testNoNamedArgumentRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/CallLikes/NoNamedArgumentRule'),
            [
                [
                    'Callable referenced by property $invokableClass is invoked with named argument for parameter $bar.',
                    17,
                    $this->errorTip(),
                ],
                [
                    'Function json_encode() is invoked with named argument for parameter $value.',
                    8,
                    $this->errorTip(),
                ],
                [
                    'Function json_encode() is invoked with named argument for parameter $value.',
                    9,
                    $this->errorTip(),
                ],
                [
                    'Function foo() is invoked with named argument for parameter $bar.',
                    17,
                    $this->errorTip(),
                ],
                [
                    'Callable referenced by $bar is invoked with named argument for parameter $baz.',
                    26,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Constructor of %s is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClass::class,
                    ),
                    31,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::create() is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClass::class,
                    ),
                    34,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::bar() is invoked with named argument for parameter $baz.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClass::class,
                    ),
                    39,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Constructor of %s is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassExtendingAbstractClass::class,
                    ),
                    43,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::create() is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassExtendingAbstractClass::class,
                    ),
                    46,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::bar() is invoked with named argument for parameter $baz.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassExtendingAbstractClass::class,
                    ),
                    51,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Constructor of %s is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassExtendingAbstractClassAndImplementingExampleInterface::class,
                    ),
                    55,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::create() is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassExtendingAbstractClassAndImplementingExampleInterface::class,
                    ),
                    58,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::bar() is invoked with named argument for parameter $baz.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassExtendingAbstractClassAndImplementingExampleInterface::class,
                    ),
                    63,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Constructor of %s is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassImplementingExampleInterface::class,
                    ),
                    67,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::create() is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassImplementingExampleInterface::class,
                    ),
                    70,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::bar() is invoked with named argument for parameter $baz.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassImplementingExampleInterface::class,
                    ),
                    75,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Constructor of %s is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\OtherExampleClassExtendingExampleClass::class,
                    ),
                    79,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::create() is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\OtherExampleClassExtendingExampleClass::class,
                    ),
                    82,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::bar() is invoked with named argument for parameter $baz.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClass::class,
                    ),
                    87,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Constructor of %s is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\OtherExampleClassExtendingExampleClassExtendingAbstractClassAndImplementingExampleInterface::class,
                    ),
                    91,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::create() is invoked with named argument for parameter $bar.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\OtherExampleClassExtendingExampleClassExtendingAbstractClassAndImplementingExampleInterface::class,
                    ),
                    94,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::bar() is invoked with named argument for parameter $baz.',
                        Test\Fixture\CallLikes\NoNamedArgumentRule\ExampleClassExtendingAbstractClassAndImplementingExampleInterface::class,
                    ),
                    99,
                    $this->errorTip(),
                ],
                [
                    'Method bar() of anonymous class is invoked with named argument for parameter $baz.',
                    116,
                    $this->errorTip(),
                ],
                [
                    'Method create() is invoked with named argument for parameter $bar.',
                    119,
                    $this->errorTip(),
                ],
                [
                    'Method create() is invoked with named argument for parameter $bar.',
                    122,
                    $this->errorTip(),
                ],
                [
                    'Callable referenced by $invokableClass is invoked with named argument for parameter $bar.',
                    127,
                    $this->errorTip(),
                ],
                [
                    'Callable referenced by $staticClassMethodCallable is invoked with named argument for parameter $bar.',
                    135,
                    $this->errorTip(),
                ],
                [
                    'Callable referenced by $dynamicClassMethodCallable is invoked with named argument for parameter $bar.',
                    143,
                    $this->errorTip(),
                ],
                [
                    'Callable referenced by $firstClassCallable is invoked with named argument for parameter $bar.',
                    148,
                    $this->errorTip(),
                ],
                [
                    'Callable is invoked with named argument for parameter $bar.',
                    153,
                    $this->errorTip(),
                ],
                [
                    'Constructor is invoked with named argument for parameter $bar.',
                    159,
                    $this->errorTip(),
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new CallLikes\NoNamedArgumentRule();
    }
}
