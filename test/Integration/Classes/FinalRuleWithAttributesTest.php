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
use Ergebnis\PHPStan\Rules\ErrorIdentifier;
use Ergebnis\PHPStan\Rules\Test;
use PhpParser\Node;
use PHPStan\Rules;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Classes\FinalRule::class)]
#[Framework\Attributes\UsesClass(ErrorIdentifier::class)]
final class FinalRuleWithAttributesTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'non-final-class-with-qualified-aliased-orm-mapping-entity-attribute' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Success/NonFinalClassWithAliasedOrmEntityAttribute.php',
            'non-final-class-with-qualified-doctrine-orm-mapping-entity-attribute' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Success/NonFinalClassWithQualifiedDoctrineOrmMappingEntityAttribute.php',
            'non-final-class-with-qualified-entity-attribute' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Success/NonFinalClassWithQualifiedEntityAttribute.php',
            'non-final-class-with-qualified-mapping-entity-attribute' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Success/NonFinalClassWithQualifiedMappingEntityAttribute.php',
            'non-final-class-with-qualified-orm-mapping-entity-attribute' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Success/NonFinalClassWithQualifiedOrmMappingEntityAttribute.php',
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
            'non-final-class-with-unqualified-doctrine-orm-mapping-entity-attribute' => [
                __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Failure/NonFinalClassWithUnqualifiedDoctrineOrmMappingEntityAttribute.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRuleWithAttributes\Failure\NonFinalClassWithUnqualifiedDoctrineOrmMappingEntityAttribute::class,
                    ),
                    7,
                ],
            ],
            'non-final-class-with-unqualified-entity-attribute' => [
                __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Failure/NonFinalClassWithUnqualifiedEntityAttribute.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRuleWithAttributes\Failure\NonFinalClassWithUnqualifiedEntityAttribute::class,
                    ),
                    7,
                ],
            ],
            'non-final-class-with-unqualified-orm-entity-attribute' => [
                __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Failure/NonFinalClassWithUnqualifiedOrmEntityAttribute.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRuleWithAttributes\Failure\NonFinalClassWithUnqualifiedOrmEntityAttribute::class,
                    ),
                    7,
                ],
            ],
            'non-final-class-with-unqualified-orm-mapping-entity-attribute' => [
                __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Failure/NonFinalClassWithUnqualifiedOrmMappingEntityAttribute.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Test\Fixture\Classes\FinalRuleWithAttributes\Failure\NonFinalClassWithUnqualifiedOrmMappingEntityAttribute::class,
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
