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

use Ergebnis\PHPStan\Rules\Classes;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules\Rule;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Classes\FinalRule::class)]
final class FinalRuleWithExcludedClassNamesTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'class-neither-abstract-nor-final-but-whitelisted' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithExcludedClassNames/Success/NeitherAbstractNorFinalClassButWhitelisted.php',
            'final-class' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithExcludedClassNames/Success/FinalClass.php',
            'final-class-with-anonymous-class' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithExcludedClassNames/Success/FinalClassWithAnonymousClass.php',
            'interface' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithExcludedClassNames/Success/ExampleInterface.php',
            'script-with-anonymous-class' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithExcludedClassNames/Success/anonymous-class.php',
            'trait' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithExcludedClassNames/Success/ExampleTrait.php',
            'trait-with-anonymous-class' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithExcludedClassNames/Success/TraitWithAnonymousClass.php',
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
            'abstract-class' => [
                __DIR__ . '/../../Fixture/Classes/FinalRuleWithExcludedClassNames/Failure/AbstractClass.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRuleWithExcludedClassNames\Failure\AbstractClass::class,
                    ),
                    7,
                ],
            ],
            'neither-abstract-nor-final-class' => [
                __DIR__ . '/../../Fixture/Classes/FinalRuleWithExcludedClassNames/Failure/NeitherAbstractNorFinalClass.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRuleWithExcludedClassNames\Failure\NeitherAbstractNorFinalClass::class,
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
        return new Classes\FinalRule(
            false,
            [
                Test\Fixture\Classes\FinalRuleWithExcludedClassNames\Success\NeitherAbstractNorFinalClassButWhitelisted::class,
            ],
        );
    }
}
