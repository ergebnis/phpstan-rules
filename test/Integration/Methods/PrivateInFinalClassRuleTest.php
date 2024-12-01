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
 * @covers \Ergebnis\PHPStan\Rules\Methods\PrivateInFinalClassRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 */
final class PrivateInFinalClassRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'abstract-class-with-protected-method' => __DIR__ . '/../../Fixture/Methods/PrivateInFinalClassRule/Success/AbstractClassWithProtectedMethod.php',
            'class-with-protected-method' => __DIR__ . '/../../Fixture/Methods/PrivateInFinalClassRule/Success/ClassWithProtectedMethod.php',
            'final-class-with-private-method' => __DIR__ . '/../../Fixture/Methods/PrivateInFinalClassRule/Success/FinalClassWithPrivateMethod.php',
            'final-class-with-protected-method-extending-class-extending-class-with-same-protected-method' => __DIR__ . '/../../Fixture/Methods/PrivateInFinalClassRule/Success/FinalClassWithProtectedMethodExtendingClassExtendingClassWithSameProtectedMethod.php',
            'final-class-with-protected-method-extending-class-with-same-protected-method' => __DIR__ . '/../../Fixture/Methods/PrivateInFinalClassRule/Success/FinalClassWithProtectedMethodExtendingClassWithSameProtectedMethod.php',
            'final-class-with-protected-method-from-trait' => __DIR__ . '/../../Fixture/Methods/PrivateInFinalClassRule/Success/FinalClassWithProtectedMethodFromTrait.php',
            'final-class-with-public-method' => __DIR__ . '/../../Fixture/Methods/PrivateInFinalClassRule/Success/FinalClassWithPublicMethod.php',
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
            'final-class-with-protected-method' => [
                __DIR__ . '/../../Fixture/Methods/PrivateInFinalClassRule/Failure/FinalClassWithProtectedMethod.php',
                [
                    \sprintf(
                        'Method %s::method() is protected, but since the containing class is final, it can be private.',
                        Test\Fixture\Methods\PrivateInFinalClassRule\Failure\FinalClassWithProtectedMethod::class,
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
        return new Methods\PrivateInFinalClassRule();
    }
}
