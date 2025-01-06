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
                        Test\Fixture\Classes\FinalRule\NeitherAbstractNorFinalClass::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithUnqualifiedDoctrineOrmMappingEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithUnqualifiedEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithUnqualifiedOrmEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithUnqualifiedOrmMappingEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithoutEntityAnnotationInInlineDocBlock::class,
                    ),
                    8,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithoutEntityAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithoutOrmEntityAnnotationInInlineDocBlock::class,
                    ),
                    8,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithoutOrmEntityAnnotationInMultilineDocBlock::class,
                    ),
                    12,
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
                        Test\Fixture\Classes\FinalRule\NeitherAbstractNorFinalClass::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithUnqualifiedDoctrineOrmMappingEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithUnqualifiedEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithUnqualifiedOrmEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithUnqualifiedOrmMappingEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithoutEntityAnnotationInInlineDocBlock::class,
                    ),
                    8,
                ],
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithoutEntityAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                ],
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithoutOrmEntityAnnotationInInlineDocBlock::class,
                    ),
                    8,
                ],
                [
                    \sprintf(
                        'Class %s is neither abstract nor final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithoutOrmEntityAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                ],
            ],
        );
    }

    public function testFinalRuleWithClassesNotRequiredToBeAbstractOrFinal(): void
    {
        $this->allowAbstractClasses = false;
        $this->classesNotRequiredToBeAbstractOrFinal = [
            Test\Fixture\Classes\FinalRule\NeitherAbstractNorFinalClass::class,
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
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithUnqualifiedDoctrineOrmMappingEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithUnqualifiedEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithUnqualifiedOrmEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithUnqualifiedOrmMappingEntityAttribute::class,
                    ),
                    7,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithoutEntityAnnotationInInlineDocBlock::class,
                    ),
                    8,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithoutEntityAnnotationInMultilineDocBlock::class,
                    ),
                    12,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithoutOrmEntityAnnotationInInlineDocBlock::class,
                    ),
                    8,
                ],
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRule\NonFinalClassWithoutOrmEntityAnnotationInMultilineDocBlock::class,
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
