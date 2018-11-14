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
use Localheinz\PHPStan\Rules\Test\Fixture;
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
                __DIR__ . '/../../Fixture/Classes/FinalRule/ExampleInterface.php',
                __DIR__ . '/../../Fixture/Classes/FinalRule/ExampleTrait.php',
            ],
            []
        );
    }

    public function testFinalClasses(): void
    {
        $this->analyse(
            [
                __DIR__ . '/../../Fixture/Classes/FinalRule/FinalClass.php',
            ],
            []
        );
    }

    public function testConstructsWithAnonymousClasses(): void
    {
        $this->analyse(
            [
                __DIR__ . '/../../Fixture/Classes/FinalRule/FinalClassWithAnonymousClass.php',
                __DIR__ . '/../../Fixture/Classes/FinalRule/script-with-anonymous-class.php',
                __DIR__ . '/../../Fixture/Classes/FinalRule/TraitWithAnonymousClass.php',
            ],
            []
        );
    }

    public function testNotFinalClasses(): void
    {
        $this->analyse(
            [
                __DIR__ . '/../../Fixture/Classes/FinalRule/AbstractClass.php',
                __DIR__ . '/../../Fixture/Classes/FinalRule/AbstractClassWithAnonymousClass.php',
                __DIR__ . '/../../Fixture/Classes/FinalRule/NeitherAbstractNorFinalClass.php',
            ],
            [
                [
                    \sprintf(
                        'Class "%s" should be marked as final.',
                        Fixture\Classes\FinalRule\AbstractClass::class
                    ),
                    16,
                ],
                [
                    \sprintf(
                        'Class "%s" should be marked as final.',
                        Fixture\Classes\FinalRule\AbstractClassWithAnonymousClass::class
                    ),
                    16,
                ],
                [
                    \sprintf(
                        'Class "%s" should be marked as final.',
                        Fixture\Classes\FinalRule\NeitherAbstractNorFinalClass::class
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
