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
final class FinalRuleTest extends AbstractTestCase
{
    public function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'final-class' => __DIR__ . '/../../Fixture/Classes/FinalRule/Success/FinalClass.php',
            'final-class-with-anonymous-class' => __DIR__ . '/../../Fixture/Classes/FinalRule/Success/FinalClassWithAnonymousClass.php',
            'interface' => __DIR__ . '/../../Fixture/Classes/FinalRule/Success/ExampleInterface.php',
            'non-final-class-with-entity-annotation-in-inline-doc-block' => __DIR__ . '/../../Fixture/Classes/FinalRule/Success/NonFinalClassWithEntityAnnotationInInlineDocBlock.php',
            'non-final-class-with-entity-annotation-in-multi-line-doc-block' => __DIR__ . '/../../Fixture/Classes/FinalRule/Success/NonFinalClassWithEntityAnnotationInMultilineDocBlock.php',
            'non-final-class-with-orm-entity-annotation-in-inline-doc-block' => __DIR__ . '/../../Fixture/Classes/FinalRule/Success/NonFinalClassWithOrmEntityAnnotationInInlineDocBlock.php',
            'non-final-class-with-orm-entity-annotation-in-multi-line-doc-block' => __DIR__ . '/../../Fixture/Classes/FinalRule/Success/NonFinalClassWithOrmEntityAnnotationInMultilineDocBlock.php',
            'non-final-class-with-orm-mapping-entity-annotation-in-inline-doc-block' => __DIR__ . '/../../Fixture/Classes/FinalRule/Success/NonFinalClassWithOrmMappingEntityAnnotationInInlineDocBlock.php',
            'non-final-class-with-orm-mapping-entity-annotation-in-multi-line-doc-block' => __DIR__ . '/../../Fixture/Classes/FinalRule/Success/NonFinalClassWithOrmMappingEntityAnnotationInMultilineDocBlock.php',
            'script-with-anonymous-class' => __DIR__ . '/../../Fixture/Classes/FinalRule/Success/anonymous-class.php',
            'trait' => __DIR__ . '/../../Fixture/Classes/FinalRule/Success/ExampleTrait.php',
            'trait-with-anonymous-class' => __DIR__ . '/../../Fixture/Classes/FinalRule/Success/TraitWithAnonymousClass.php',
        ];

        foreach ($paths as $description => $path) {
            yield $description => [
                $path,
            ];
        }
    }

    public function provideCasesWhereAnalysisShouldFail(): iterable
    {
        $paths = [
            'abstract-class' => [
                __DIR__ . '/../../Fixture/Classes/FinalRule/Failure/AbstractClass.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Fixture\Classes\FinalRule\Failure\AbstractClass::class
                    ),
                    7,
                ],
            ],
            'neither-abstract-nor-final-class' => [
                __DIR__ . '/../../Fixture/Classes/FinalRule/Failure/NeitherAbstractNorFinalClass.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Fixture\Classes\FinalRule\Failure\NeitherAbstractNorFinalClass::class
                    ),
                    7,
                ],
            ],
            'non-final-class-without-entity-annotation-in-inline-doc-block' => [
                __DIR__ . '/../../Fixture/Classes/FinalRule/Failure/NonFinalClassWithoutEntityAnnotationInInlineDocBlock.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Fixture\Classes\FinalRule\Failure\NonFinalClassWithoutEntityAnnotationInInlineDocBlock::class
                    ),
                    8,
                ],
            ],
            'non-final-class-without-entity-annotation-in-multi-line-doc-block' => [
                __DIR__ . '/../../Fixture/Classes/FinalRule/Failure/NonFinalClassWithoutEntityAnnotationInMultilineDocBlock.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Fixture\Classes\FinalRule\Failure\NonFinalClassWithoutEntityAnnotationInMultilineDocBlock::class
                    ),
                    11,
                ],
            ],
            'non-final-class-without-orm-entity-annotation-in-inline-doc-block' => [
                __DIR__ . '/../../Fixture/Classes/FinalRule/Failure/NonFinalClassWithoutOrmEntityAnnotationInInlineDocBlock.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Fixture\Classes\FinalRule\Failure\NonFinalClassWithoutOrmEntityAnnotationInInlineDocBlock::class
                    ),
                    8,
                ],
            ],
            'non-final-class-without-orm-entity-annotation-in-multi-line-doc-block' => [
                __DIR__ . '/../../Fixture/Classes/FinalRule/Failure/NonFinalClassWithoutOrmEntityAnnotationInMultilineDocBlock.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Fixture\Classes\FinalRule\Failure\NonFinalClassWithoutOrmEntityAnnotationInMultilineDocBlock::class
                    ),
                    11,
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
            []
        );
    }
}
