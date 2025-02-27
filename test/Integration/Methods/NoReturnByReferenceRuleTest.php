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
 * @covers \Ergebnis\PHPStan\Rules\Methods\NoReturnByReferenceRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Methods\NoReturnByReferenceRule>
 */
final class NoReturnByReferenceRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoReturnByReferenceRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Methods/NoReturnByReferenceRule'),
            [
                [
                    \sprintf(
                        'Method %s::foo() returns by reference.',
                        Test\Fixture\Methods\NoReturnByReferenceRule\ClassWithMethodReturningByReference::class,
                    ),
                    9,
                ],
                [
                    \sprintf(
                        'Method %s::foo() returns by reference.',
                        Test\Fixture\Methods\NoReturnByReferenceRule\InterfaceWithMethodReturningByReference::class,
                    ),
                    9,
                ],
                [
                    'Method foo() in anonymous class returns by reference.',
                    21,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Methods\NoReturnByReferenceRule();
    }
}
