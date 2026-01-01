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
 * @covers \Ergebnis\PHPStan\Rules\Methods\NoParameterPassedByReferenceRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Methods\NoParameterPassedByReferenceRule>
 */
final class NoParameterPassedByReferenceTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoParameterPassedByReferenceRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Methods/NoParameterPassedByReferenceRule'),
            [
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar that is passed by reference.',
                        Test\Fixture\Methods\NoParameterPassedByReferenceRule\ClassWithMethodWithTypedParameterExplicitlyPassedByReference::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar that is passed by reference.',
                        Test\Fixture\Methods\NoParameterPassedByReferenceRule\ClassWithMethodWithUntypedParameterExplicitlyPassedByReference::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar that is passed by reference.',
                        Test\Fixture\Methods\NoParameterPassedByReferenceRule\InterfaceWithMethodWithTypedParameterExplicitlyPassedByReference::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::foo() has parameter $bar that is passed by reference.',
                        Test\Fixture\Methods\NoParameterPassedByReferenceRule\InterfaceWithMethodWithUntypedParameterExplicitlyPassedByReference::class,
                    ),
                    9,
                ],
                [
                    'Method foo() in anonymous class has parameter $bar that is passed by reference.',
                    28,
                ],
                [
                    'Method foo() in anonymous class has parameter $bar that is passed by reference.',
                    35,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Methods\NoParameterPassedByReferenceRule();
    }
}
