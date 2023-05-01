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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Classes;

use Ergebnis\PHPStan\Rules\Classes\NoExtendsRule;
use Ergebnis\PHPStan\Rules\Test\Fixture;
use Ergebnis\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 *
 * @covers \Ergebnis\PHPStan\Rules\Classes\NoExtendsRule
 */
final class NoExtendsRuleWithClassesAllowedToBeExtendedTest extends AbstractTestCase
{
    public static function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'class' => __DIR__ . '/../../Fixture/Classes/NoExtendsRuleWithClassesAllowedToBeExtended/Success/ExampleClass.php',
            'class-extending-class-allowed-to-be-extended' => __DIR__ . '/../../Fixture/Classes/NoExtendsRuleWithClassesAllowedToBeExtended/Success/ClassExtendingClassAllowedToBeExtended.php',
            'class-extending-php-unit-framework-test-case' => __DIR__ . '/../../Fixture/Classes/NoExtendsRuleWithClassesAllowedToBeExtended/Success/ClassExtendingPhpUnitFrameworkTestCase.php',
            'interface' => __DIR__ . '/../../Fixture/Classes/NoExtendsRuleWithClassesAllowedToBeExtended/Success/ExampleInterface.php',
            'interface-extending-other-interface' => __DIR__ . '/../../Fixture/Classes/NoExtendsRuleWithClassesAllowedToBeExtended/Success/InterfaceExtendingOtherInterface.php',
            'script-with-anonymous-class' => __DIR__ . '/../../Fixture/Classes/NoExtendsRuleWithClassesAllowedToBeExtended/Success/anonymous-class.php',
            'script-with-anonymous-class-extending-class-allowed-to-be-extended' => __DIR__ . '/../../Fixture/Classes/NoExtendsRuleWithClassesAllowedToBeExtended/Success/anonymous-class-extending-class-allowed-to-be-extended.php',
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
            'class-extending-other-class' => [
                __DIR__ . '/../../Fixture/Classes/NoExtendsRuleWithClassesAllowedToBeExtended/Failure/ClassExtendingOtherClass.php',
                [
                    \sprintf(
                        'Class "%s" is not allowed to extend "%s".',
                        Fixture\Classes\NoExtendsRuleWithClassesAllowedToBeExtended\Failure\ClassExtendingOtherClass::class,
                        Fixture\Classes\NoExtendsRuleWithClassesAllowedToBeExtended\Failure\OtherClass::class,
                    ),
                    7,
                ],
            ],
            'script-with-anonymous-class-extending-other-class' => [
                __DIR__ . '/../../Fixture/Classes/NoExtendsRuleWithClassesAllowedToBeExtended/Failure/anonymous-class-extending-other-class.php',
                [
                    \sprintf(
                        'Anonymous class is not allowed to extend "%s".',
                        Fixture\Classes\NoExtendsRuleWithClassesAllowedToBeExtended\Failure\OtherClass::class,
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

    protected function getRule(): Rule
    {
        return new NoExtendsRule([
            Fixture\Classes\NoExtendsRuleWithClassesAllowedToBeExtended\Success\ClassAllowedToBeExtended::class,
        ]);
    }
}
