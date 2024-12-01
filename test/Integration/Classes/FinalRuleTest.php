<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2024 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration\Classes;

use Ergebnis\PHPStan\Rules\Classes;
use Ergebnis\PHPStan\Rules\Test;
use PhpParser\Node;
use PHPStan\Rules;

/**
 * @covers \Ergebnis\PHPStan\Rules\Classes\FinalRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 */
final class FinalRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
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

    public static function provideCasesWhereAnalysisShouldFail(): iterable
    {
        $paths = [
            'abstract-class' => [
                __DIR__ . '/../../Fixture/Classes/FinalRule/Failure/AbstractClass.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\Failure\AbstractClass::class,
                    ),
                    7,
                ],
            ],
            'neither-abstract-nor-final-class' => [
                __DIR__ . '/../../Fixture/Classes/FinalRule/Failure/NeitherAbstractNorFinalClass.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\Failure\NeitherAbstractNorFinalClass::class,
                    ),
                    7,
                ],
            ],
            'non-final-class-without-entity-annotation-in-inline-doc-block' => [
                __DIR__ . '/../../Fixture/Classes/FinalRule/Failure/NonFinalClassWithoutEntityAnnotationInInlineDocBlock.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\Failure\NonFinalClassWithoutEntityAnnotationInInlineDocBlock::class,
                    ),
                    8,
                ],
            ],
            'non-final-class-without-entity-annotation-in-multi-line-doc-block' => [
                __DIR__ . '/../../Fixture/Classes/FinalRule/Failure/NonFinalClassWithoutEntityAnnotationInMultilineDocBlock.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\Failure\NonFinalClassWithoutEntityAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                ],
            ],
            'non-final-class-without-orm-entity-annotation-in-inline-doc-block' => [
                __DIR__ . '/../../Fixture/Classes/FinalRule/Failure/NonFinalClassWithoutOrmEntityAnnotationInInlineDocBlock.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\Failure\NonFinalClassWithoutOrmEntityAnnotationInInlineDocBlock::class,
                    ),
                    8,
                ],
            ],
            'non-final-class-without-orm-entity-annotation-in-multi-line-doc-block' => [
                __DIR__ . '/../../Fixture/Classes/FinalRule/Failure/NonFinalClassWithoutOrmEntityAnnotationInMultilineDocBlock.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\Failure\NonFinalClassWithoutOrmEntityAnnotationInMultilineDocBlock::class,
                    ),
                    12,
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

    /**
     * @return Rules\Rule<Node\Stmt\Class_>
     */
    protected function getRule(): Rules\Rule
    {
        return new Classes\FinalRule(
            false,
            [],
        );
    }
}
