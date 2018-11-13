<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/phpstan-rules
 */

namespace Localheinz\PHPStan\Rules\Test\Integration\Classes;

use Localheinz\PHPStan\Rules\Classes\FinalRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @internal
 */
final class FinalRuleTest extends RuleTestCase
{
    public function testNotClasses(): void
    {
        $this->analyse(
            [
                __DIR__ . '/Fixture/ExampleInterface.php',
                __DIR__ . '/Fixture/ExampleTrait.php',
            ],
            []
        );
    }

    public function testFinalClasses(): void
    {
        $this->analyse(
            [
                __DIR__ . '/Fixture/FinalClass.php',
            ],
            []
        );
    }

    public function testConstructsWithAnonymousClasses(): void
    {
        $this->analyse(
            [
                __DIR__ . '/Fixture/FinalClassWithAnonymousClass.php',
                __DIR__ . '/Fixture/script-with-anonymous-class.php',
                __DIR__ . '/Fixture/TraitWithAnonymousClass.php',
            ],
            []
        );
    }

    public function testNotFinalClasses(): void
    {
        $this->analyse(
            [
                __DIR__ . '/Fixture/AbstractClass.php',
                __DIR__ . '/Fixture/AbstractClassWithAnonymousClass.php',
                __DIR__ . '/Fixture/NeitherAbstractNorFinalClass.php',
            ],
            [
                [
                    \sprintf(
                        'Class "%s" should be marked as final.',
                        Fixture\AbstractClass::class
                    ),
                    16,
                ],
                [
                    \sprintf(
                        'Class "%s" should be marked as final.',
                        Fixture\AbstractClassWithAnonymousClass::class
                    ),
                    16,
                ],
                [
                    \sprintf(
                        'Class "%s" should be marked as final.',
                        Fixture\NeitherAbstractNorFinalClass::class
                    ),
                    16,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return new FinalRule();
    }
}
