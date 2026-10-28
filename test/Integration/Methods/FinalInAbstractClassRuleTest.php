<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2026 Andreas Möller
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
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Methods\FinalInAbstractClassRule
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSample
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ErrorTip
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Parameter
 * @uses \Ergebnis\PHPStan\Rules\Documentation\RuleDefinition
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Methods\FinalInAbstractClassRule>
 */
final class FinalInAbstractClassRuleTest extends Testing\RuleTestCase
{
    use Test\Util\ErrorTip;
    use Test\Util\Helper;

    public function testFinalInAbstractClassRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Methods/FinalInAbstractClassRule'),
            [
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\AbstractClassWithProtectedMethod::class,
                    ),
                    9,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\AbstractClassWithPublicMethod::class,
                    ),
                    9,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\AbstractClassWithProtectedMethodAndEmbeddableAnnotationInInlineDocBlock::class,
                    ),
                    10,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\AbstractClassWithProtectedMethodAndOrmEmbeddableAnnotationInInlineDocBlock::class,
                    ),
                    10,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\AbstractClassWithProtectedMethodAndOrmMappingEmbeddableAnnotationInInlineDocBlock::class,
                    ),
                    10,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\AbstractClassWithPublicMethodAndEmbeddableAnnotationInInlineDocBlock::class,
                    ),
                    10,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\AbstractClassWithPublicMethodAndOrmEmbeddableAnnotationInInlineDocBlock::class,
                    ),
                    10,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\AbstractClassWithPublicMethodAndOrmMappingEmbeddableAnnotationInInlineDocBlock::class,
                    ),
                    10,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\AbstractClassWithProtectedMethodAndEmbeddableAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\AbstractClassWithProtectedMethodAndEmbeddableAttribute::class,
                    ),
                    12,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\AbstractClassWithProtectedMethodAndOrmEmbeddableAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\AbstractClassWithProtectedMethodAndOrmMappingEmbeddableAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\AbstractClassWithPublicMethodAndEmbeddableAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\AbstractClassWithPublicMethodAndEmbeddableAttribute::class,
                    ),
                    12,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\AbstractClassWithPublicMethodAndOrmEmbeddableAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                    $this->errorTip(),
                ],
                [
                    \sprintf(
                        'Method %s::method() is not final, but since the containing class is abstract, it should be.',
                        Test\Fixture\Methods\FinalInAbstractClassRule\AbstractClassWithPublicMethodAndOrmMappingEmbeddableAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                    $this->errorTip(),
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Methods\FinalInAbstractClassRule();
    }
}
