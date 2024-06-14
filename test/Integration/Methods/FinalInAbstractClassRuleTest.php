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
use PHPStan\Rules;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Methods\FinalInAbstractClassRule::class)]
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
            'abstract-class-with-protected-method-and-entity-annotaton-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndEntityAnnotationInInlineDocBlock.php',
            'abstract-class-with-protected-method-and-entity-annotaton-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndEntityAnnotationInMultilineDocBlock.php',
            'abstract-class-with-protected-method-and-orm-entity-annotaton-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndOrmEntityAnnotationInMultilineDocBlock.php',
            'abstract-class-with-protected-method-and-orm-entity-annotaton-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndOrmEntityAnnotationInInlineDocBlock.php',
            'abstract-class-with-protected-method-and-orm-mapping-entity-annotaton-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndOrmMappingEntityAnnotationInInlineDocBlock.php',
            'abstract-class-with-protected-method-and-orm-mapping-entity-annotaton-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithProtectedMethodAndOrmMappingEntityAnnotationInMultilineDocBlock.php',
            'abstract-class-with-public-method-and-entity-annotaton-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndEntityAnnotationInInlineDocBlock.php',
            'abstract-class-with-public-method-and-entity-annotaton-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndEntityAnnotationInMultilineDocBlock.php',
            'abstract-class-with-public-method-and-orm-entity-annotaton-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndOrmEntityAnnotationInMultilineDocBlock.php',
            'abstract-class-with-public-method-and-orm-entity-annotaton-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndOrmEntityAnnotationInInlineDocBlock.php',
            'abstract-class-with-public-method-and-orm-mapping-entity-annotaton-in-inline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndOrmMappingEntityAnnotationInInlineDocBlock.php',
            'abstract-class-with-public-method-and-orm-mapping-entity-annotaton-in-multiline-doc-block' => __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Success/AbstractClassWithPublicMethodAndOrmMappingEntityAnnotationInMultilineDocBlock.php',
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
            'abstract-class-with-protected-method-and-without-entity-annotation-in-inline-doc-block' => [
                __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Failure/AbstractClassWithProtectedMethodAndWithoutEntityAnnotationInInlineDocBlock.php',
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Fixture\Methods\FinalInAbstractClassRule\Failure\AbstractClassWithProtectedMethodAndWithoutEntityAnnotationInInlineDocBlock::class
                    ),
                    10,
                ],
            ],
            'abstract-class-with-protected-method-and-without-entity-annotation-in-multiline-doc-block' => [
                __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Failure/AbstractClassWithProtectedMethodAndWithoutEntityAnnotationInMultilineDocBlock.php',
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Fixture\Methods\FinalInAbstractClassRule\Failure\AbstractClassWithProtectedMethodAndWithoutEntityAnnotationInMultilineDocBlock::class
                    ),
                    12,
                ],
            ],
            'abstract-class-with-protected-method-and-without-orm-entity-annotation-in-inline-doc-block' => [
                __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Failure/AbstractClassWithProtectedMethodAndWithoutOrmEntityAnnotationInInlineDocBlock.php',
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Fixture\Methods\FinalInAbstractClassRule\Failure\AbstractClassWithProtectedMethodAndWithoutOrmEntityAnnotationInInlineDocBlock::class
                    ),
                    10,
                ],
            ],
            'abstract-class-with-protected-method-and-without-orm-entity-annotation-in-multiline-doc-block' => [
                __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Failure/AbstractClassWithProtectedMethodAndWithoutOrmEntityAnnotationInMultilineDocBlock.php',
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Fixture\Methods\FinalInAbstractClassRule\Failure\AbstractClassWithProtectedMethodAndWithoutOrmEntityAnnotationInMultilineDocBlock::class
                    ),
                    12,
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
            'abstract-class-with-public-method-and-without-entity-annotation-in-inline-doc-block' => [
                __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Failure/AbstractClassWithPublicMethodAndWithoutEntityAnnotationInInlineDocBlock.php',
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Fixture\Methods\FinalInAbstractClassRule\Failure\AbstractClassWithPublicMethodAndWithoutEntityAnnotationInInlineDocBlock::class
                    ),
                    10,
                ],
            ],
            'abstract-class-with-public-method-and-without-entity-annotation-in-multiline-doc-block' => [
                __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Failure/AbstractClassWithPublicMethodAndWithoutEntityAnnotationInMultilineDocBlock.php',
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Fixture\Methods\FinalInAbstractClassRule\Failure\AbstractClassWithPublicMethodAndWithoutEntityAnnotationInMultilineDocBlock::class
                    ),
                    12,
                ],
            ],
            'abstract-class-with-public-method-and-without-orm-entity-annotation-in-inline-doc-block' => [
                __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Failure/AbstractClassWithPublicMethodAndWithoutOrmEntityAnnotationInInlineDocBlock.php',
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Fixture\Methods\FinalInAbstractClassRule\Failure\AbstractClassWithPublicMethodAndWithoutOrmEntityAnnotationInInlineDocBlock::class
                    ),
                    10,
                ],
            ],
            'abstract-class-with-public-method-and-without-orm-entity-annotation-in-multiline-doc-block' => [
                __DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule/Failure/AbstractClassWithPublicMethodAndWithoutOrmEntityAnnotationInMultilineDocBlock.php',
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Fixture\Methods\FinalInAbstractClassRule\Failure\AbstractClassWithPublicMethodAndWithoutOrmEntityAnnotationInMultilineDocBlock::class
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

    protected function getRule(): Rules\Rule
    {
        return new Methods\FinalInAbstractClassRule();
    }
}
