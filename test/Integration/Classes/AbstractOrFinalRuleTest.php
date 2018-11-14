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

use Localheinz\PHPStan\Rules\Classes\AbstractOrFinalRule;
use Localheinz\PHPStan\Rules\Test\Fixture;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @internal
 */
final class AbstractOrFinalRuleTest extends RuleTestCase
{
    public function testNotClasses(): void
    {
        $this->analyse(
            [
                __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/ExampleInterface.php',
                __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/ExampleTrait.php',
            ],
            []
        );
    }

    public function testAbstractOrFinalClasses(): void
    {
        $this->analyse(
            [
                __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/AbstractClass.php',
                __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/FinalClass.php',
            ],
            []
        );
    }

    public function testConstructsWithAnonymousClasses(): void
    {
        $this->analyse(
            [
                __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/AbstractClassWithAnonymousClass.php',
                __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/FinalClassWithAnonymousClass.php',
                __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/script-with-anonymous-class.php',
                __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/TraitWithAnonymousClass.php',
            ],
            []
        );
    }

    public function testNeitherAbstractNorFinalClass(): void
    {
        $this->analyse(
            [
                __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/NeitherAbstractNorFinalClass.php',
            ],
            [
                [
                    \sprintf(
                        'Class "%s" should be marked as abstract or final.',
                        Fixture\Classes\AbstractOrFinalRule\NeitherAbstractNorFinalClass::class
                    ),
                    16,
                ],
            ]
        );
    }

    protected function getRule(): Rule
    {
        return new AbstractOrFinalRule();
    }
}
