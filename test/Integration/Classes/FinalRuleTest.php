<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2025 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration\Classes;

use Ergebnis\PHPStan\Rules\Classes;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Classes\FinalRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Classes\FinalRule>
 */
final class FinalRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;
    private bool $allowAbstractClasses;

    /**
     * @var list<class-string>
     */
    private array $classesNotRequiredToBeAbstractOrFinal;

    public function testFinalRule(): void
    {
        $this->allowAbstractClasses = false;
        $this->classesNotRequiredToBeAbstractOrFinal = [];

        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Classes/FinalRule'),
            [
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\AbstractClass::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ClassWithUnqualifiedDoctrineOrmMappingEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ClassWithUnqualifiedEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ClassWithUnqualifiedOrmEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ClassWithUnqualifiedOrmMappingEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ClassWithoutEntityAnnotationInInlineDocBlock::class,
                    ),
                    8,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ClassWithoutEntityAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ClassWithoutOrmEntityAnnotationInInlineDocBlock::class,
                    ),
                    8,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ClassWithoutOrmEntityAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ExampleClass::class,
                    ),
                    7,
                ],
            ],
        );
    }

    public function testFinalRuleWithAllowAbstractClasses(): void
    {
        $this->allowAbstractClasses = true;
        $this->classesNotRequiredToBeAbstractOrFinal = [];

        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Classes/FinalRule'),
            [
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\ClassWithUnqualifiedDoctrineOrmMappingEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\ClassWithUnqualifiedEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\ClassWithUnqualifiedOrmEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\ClassWithUnqualifiedOrmMappingEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\ClassWithoutEntityAnnotationInInlineDocBlock::class,
                    ),
                    8,
                ],
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\ClassWithoutEntityAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                ],
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\ClassWithoutOrmEntityAnnotationInInlineDocBlock::class,
                    ),
                    8,
                ],
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\ClassWithoutOrmEntityAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                ],
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\ExampleClass::class,
                    ),
                    7,
                ],
            ],
        );
    }

    public function testFinalRuleWithClassesNotRequiredToBeAbstractOrFinal(): void
    {
        $this->allowAbstractClasses = false;
        $this->classesNotRequiredToBeAbstractOrFinal = [
            Test\Fixture\Classes\FinalRule\ExampleClass::class,
        ];

        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Classes/FinalRule'),
            [
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\AbstractClass::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ClassWithUnqualifiedDoctrineOrmMappingEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ClassWithUnqualifiedEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ClassWithUnqualifiedOrmEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ClassWithUnqualifiedOrmMappingEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ClassWithoutEntityAnnotationInInlineDocBlock::class,
                    ),
                    8,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ClassWithoutEntityAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ClassWithoutOrmEntityAnnotationInInlineDocBlock::class,
                    ),
                    8,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\ClassWithoutOrmEntityAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Classes\FinalRule(
            $this->allowAbstractClasses,
            $this->classesNotRequiredToBeAbstractOrFinal,
        );
    }
}
