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
