<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2023 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration\Classes;

use Ergebnis\PHPStan\Rules\Classes\FinalRule;
use Ergebnis\PHPStan\Rules\Test\Fixture;
use Ergebnis\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 *
 * @covers \Ergebnis\PHPStan\Rules\Classes\FinalRule
 */
final class FinalRuleWithAbstractClassesAllowedTest extends AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'abstract-class' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAbstractClassesAllowed/Failure/AbstractClass.php',
            'final-class' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAbstractClassesAllowed/Success/FinalClass.php',
            'final-class-with-anonymous-class' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAbstractClassesAllowed/Success/FinalClassWithAnonymousClass.php',
            'interface' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAbstractClassesAllowed/Success/ExampleInterface.php',
            'script-with-anonymous-class' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAbstractClassesAllowed/Success/anonymous-class.php',
            'trait' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAbstractClassesAllowed/Success/ExampleTrait.php',
            'trait-with-anonymous-class' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAbstractClassesAllowed/Success/TraitWithAnonymousClass.php',
        ];

        foreach ($paths as $description => $path) {
            yield $description => [
                $path,
            ];
        }
    }

    public static function provideCasesWhereAnalysisShouldFail(): iterable
    {
        $paths = [
            'neither-abstract-nor-final-class' => [
                __DIR__ . '/../../Fixture/Classes/FinalRuleWithAbstractClassesAllowed/Failure/NeitherAbstractNorFinalClass.php',
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Fixture\Classes\FinalRuleWithAbstractClassesAllowed\Failure\NeitherAbstractNorFinalClass::class,
                    ),
                    7,
                ],
            ],
        ];

        foreach ($paths as $description => [$path, $error]) {
            yield $description => [
                $path,
                $error,
            ];
        }
    }

    protected function getRule(): Rule
    {
        return new FinalRule(
            true,
            [],
        );
    }
}
