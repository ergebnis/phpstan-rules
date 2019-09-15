<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/phpstan-rules
 */

namespace Localheinz\PHPStan\Rules\Test\Integration\Methods;

use Localheinz\PHPStan\Rules\Methods\PrivateInFinalClassRule;
use Localheinz\PHPStan\Rules\Test\Fixture;
use Localheinz\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 *
 * @covers \Localheinz\PHPStan\Rules\Methods\PrivateInFinalClassRule
 */
final class PrivateInFinalClassRuleTest extends AbstractTestCase
{
    public function providerAnalysisSucceeds(): iterable
    {
        $paths = [
            'final-class-with-private-method' => __DIR__ . '/../../Fixture/Methods/PrivateInFinalClassRule/Success/FinalClassWithPrivateMethod.php',
            'final-class-with-public-method' => __DIR__ . '/../../Fixture/Methods/PrivateInFinalClassRule/Success/FinalClassWithPublicMethod.php',
            'final-class-with-protected-method-extending-class-with-same-protected-method' => __DIR__ . '/../../Fixture/Methods/PrivateInFinalClassRule/Success/FinalClassWithProtectedMethodExtendingClassWithSameProtectedMethod.php',
            'final-class-with-protected-method-extending-class-extending-class-with-same-protected-method' => __DIR__ . '/../../Fixture/Methods/PrivateInFinalClassRule/Success/FinalClassWithProtectedMethodExtendingClassExtendingClassWithSameProtectedMethod.php',
            'class-with-protected-method' => __DIR__ . '/../../Fixture/Methods/PrivateInFinalClassRule/Success/ClassWithProtectedMethod.php',
            'abstract-class-with-protected-method' => __DIR__ . '/../../Fixture/Methods/PrivateInFinalClassRule/Success/AbstractClassWithProtectedMethod.php',
        ];

        foreach ($paths as $description => $path) {
            yield $description => [
                $path,
            ];
        }
    }

    public function providerAnalysisFails(): iterable
    {
        $paths = [
            'final-class-with-protected-method' => [
                __DIR__ . '/../../Fixture/Methods/PrivateInFinalClassRule/Failure/FinalClassWithProtectedMethod.php',
                [
                    \sprintf(
                        'Method %s::method() is protected, but since the containing class is final, it can be private.',
                        Fixture\Methods\PrivateInFinalClassRule\Failure\FinalClassWithProtectedMethod::class
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

    protected function getRule(): Rule
    {
        return new PrivateInFinalClassRule();
    }
}
