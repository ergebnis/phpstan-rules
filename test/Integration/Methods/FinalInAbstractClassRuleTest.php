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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Methods;

use Ergebnis\PHPStan\Rules\Methods;
use Ergebnis\PHPStan\Rules\Test;
use PhpParser\Node;
use PHPStan\Rules;

/**
 * @covers \Ergebnis\PHPStan\Rules\Methods\FinalInAbstractClassRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 */
final class FinalInAbstractClassRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'abstract-class-with-abstract-method' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithAbstractMethod.php',
            'abstract-class-with-final-protected-method' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithFinalProtectedMethod.php',
            'abstract-class-with-final-public-method' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithFinalPublicMethod.php',
            'abstract-class-with-non-final-constructor' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithNonFinalConstructor.php',
            'abstract-class-with-private-method' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPrivateMethod.php',
            'abstract-class-with-protected-method-and-embeddable-annotation-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndEmbeddableAnnotationInInlineDocBlock.php',
            'abstract-class-with-protected-method-and-embeddable-annotation-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndEmbeddableAnnotationInMultilineDocBlock.php',
            'abstract-class-with-protected-method-and-embeddable-attribute' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndEmbeddableAttribute.php',
            'abstract-class-with-protected-method-and-entity-annotation-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndEntityAnnotationInInlineDocBlock.php',
            'abstract-class-with-protected-method-and-entity-annotation-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndEntityAnnotationInMultilineDocBlock.php',
            'abstract-class-with-protected-method-and-entity-attribute' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndEntityAttribute.php',
            'abstract-class-with-protected-method-and-orm-embeddable-annotation-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndOrmEmbeddableAnnotationInMultilineDocBlock.php',
            'abstract-class-with-protected-method-and-orm-embeddable-annotation-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndOrmEmbeddableAnnotationInInlineDocBlock.php',
            'abstract-class-with-protected-method-and-orm-entity-annotation-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndOrmEntityAnnotationInMultilineDocBlock.php',
            'abstract-class-with-protected-method-and-orm-entity-annotation-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndOrmEntityAnnotationInInlineDocBlock.php',
            'abstract-class-with-protected-method-and-orm-mapping-embeddable-annotation-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndOrmMappingEmbeddableAnnotationInInlineDocBlock.php',
            'abstract-class-with-protected-method-and-orm-mapping-embeddable-annotation-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndOrmMappingEmbeddableAnnotationInMultilineDocBlock.php',
            'abstract-class-with-protected-method-and-orm-mapping-entity-annotation-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndOrmMappingEntityAnnotationInInlineDocBlock.php',
            'abstract-class-with-protected-method-and-orm-mapping-entity-annotation-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndOrmMappingEntityAnnotationInMultilineDocBlock.php',
            'abstract-class-with-public-method-and-embeddable-annotation-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndEmbeddableAnnotationInInlineDocBlock.php',
            'abstract-class-with-public-method-and-embeddable-annotation-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndEmbeddableAnnotationInMultilineDocBlock.php',
            'abstract-class-with-public-method-and-embeddable-attribute' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndEmbeddableAttribute.php',
            'abstract-class-with-public-method-and-entity-annotation-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndEntityAnnotationInInlineDocBlock.php',
            'abstract-class-with-public-method-and-entity-annotation-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndEntityAnnotationInMultilineDocBlock.php',
            'abstract-class-with-public-method-and-entity-attribute' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndEntityAttribute.php',
            'abstract-class-with-public-method-and-orm-embeddable-annotation-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndOrmEmbeddableAnnotationInMultilineDocBlock.php',
            'abstract-class-with-public-method-and-orm-embeddable-annotation-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndOrmEmbeddableAnnotationInInlineDocBlock.php',
            'abstract-class-with-public-method-and-orm-entity-annotation-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndOrmEntityAnnotationInMultilineDocBlock.php',
            'abstract-class-with-public-method-and-orm-entity-annotation-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndOrmEntityAnnotationInInlineDocBlock.php',
            'abstract-class-with-public-method-and-orm-mapping-embeddable-annotation-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndOrmMappingEmbeddableAnnotationInInlineDocBlock.php',
            'abstract-class-with-public-method-and-orm-mapping-embeddable-annotation-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndOrmMappingEmbeddableAnnotationInMultilineDocBlock.php',
            'abstract-class-with-public-method-and-orm-mapping-entity-annotation-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndOrmMappingEntityAnnotationInInlineDocBlock.php',
            'abstract-class-with-public-method-and-orm-mapping-entity-annotation-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndOrmMappingEntityAnnotationInMultilineDocBlock.php',
            'interface-with-public-method' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/InterfaceWithPublicMethod.php',
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
            'abstract-class-with-protected-method' => [
                __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Failure/AbstractClassWithProtectedMethod.php',
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\Failure\AbstractClassWithProtectedMethod::class,
                    ),
                    9,
                ],
            ],
            'abstract-class-with-public-method' => [
                __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Failure/AbstractClassWithPublicMethod.php',
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\Failure\AbstractClassWithPublicMethod::class,
                    ),
                    9,
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
     * @return Rules\Rule<Node\Stmt\ClassMethod>
     */
    protected function getRule(): Rules\Rule
    {
        return new Methods\FinalInAbstractClassRule();
    }
}
