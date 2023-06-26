<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2023 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration\Classes\PHPUnit\Framework;

use Ergebnis\PHPStan\Rules\Classes;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules\Rule;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Classes\PHPUnit\Framework\TestCaseWithSuffixRule::class)]
final class TestCaseWithSuffixRuleTest extends Test\Integration\AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'concrete-test-case-with-suffix-test' => __DIR__ . '/../../../../Fixture/Classes/PHPUnit/Framework/TestCaseWithSuffixRule/Success/ConcreteTestCaseWithSuffixTest.php',
            'explicitly-abstract-test-case' => __DIR__ . '/../../../../Fixture/Classes/PHPUnit/Framework/TestCaseWithSuffixRule/Success/ExplicitlyAbstractTestCase.php',
            'implicitly-abstract-test-case' => __DIR__ . '/../../../../Fixture/Classes/PHPUnit/Framework/TestCaseWithSuffixRule/Success/ExplicitlyAbstractTestCase.php',
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
            'concrete-test-case-extending-abstract-test-case-without-test-suffix' => [
                __DIR__ . '/../../../../Fixture/Classes/PHPUnit/Framework/TestCaseWithSuffixRule/Failure/ConcreteTestCaseExtendingAbstractTestCaseWithoutTestSuffix.php',
                [
                    \sprintf(
                        'Class %s extends %s, is concrete, but does not have a Test suffix.',
                        Test\Fixture\Classes\PHPUnit\Framework\TestCaseWithSuffixRule\Failure\ConcreteTestCaseExtendingAbstractTestCaseWithoutTestSuffix::class,
                        Framework\TestCase::class,
                    ),
                    9,
                ],
            ],
            'concrete-test-case-without-test-suffix' => [
                __DIR__ . '/../../../../Fixture/Classes/PHPUnit/Framework/TestCaseWithSuffixRule/Failure/ConcreteTestCaseWithoutTestSuffix.php',
                [
                    \sprintf(
                        'Class %s extends %s, is concrete, but does not have a Test suffix.',
                        Test\Fixture\Classes\PHPUnit\Framework\TestCaseWithSuffixRule\Failure\ConcreteTestCaseWithoutTestSuffix::class,
                        Framework\TestCase::class,
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
        return new Classes\PHPUnit\Framework\TestCaseWithSuffixRule($this->createReflectionProvider());
    }
}
