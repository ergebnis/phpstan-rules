<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/phpstan-rules
 */

namespace Localheinz\PHPStan\Rules\Test\Integration\Classes;

use Localheinz\PHPStan\Rules\Classes\FinalRule;
use Localheinz\PHPStan\Rules\Test\Fixture;
use Localheinz\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 */
final class FinalRuleWithExcludedClassNamesTest extends AbstractTestCase
{
    public function providerAnalysisSucceeds(): \Generator
    {
        $paths = [
            'final-class' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithExcludedClassNames/Success/FinalClass.php',
            'final-class-with-anonymous-class' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithExcludedClassNames/Success/FinalClassWithAnonymousClass.php',
            'class-neither-abstract-nor-final-but-whitelisted' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithExcludedClassNames/Success/NeitherAbstractNorFinalClassButWhitelisted.php',
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

    public function providerAnalysisFails(): \Generator
    {
        $paths = [
            'abstract-class' => [
                __DIR__ . '/../../Fixture/Classes/FinalRuleWithExcludedClassNames/Failure/AbstractClass.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Fixture\Classes\FinalRuleWithExcludedClassNames\Failure\AbstractClass::class
                    ),
                    7,
                ],
            ],
            'neither-abstract-nor-final-class' => [
                __DIR__ . '/../../Fixture/Classes/FinalRuleWithExcludedClassNames/Failure/NeitherAbstractNorFinalClass.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Fixture\Classes\FinalRuleWithExcludedClassNames\Failure\NeitherAbstractNorFinalClass::class
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
            false,
            [
                Fixture\Classes\FinalRuleWithExcludedClassNames\Success\NeitherAbstractNorFinalClassButWhitelisted::class,
            ]
        );
    }
}
