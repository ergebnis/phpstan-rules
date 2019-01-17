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

namespace Localheinz\PHPStan\Rules\Test\Integration\Classes;

use Localheinz\PHPStan\Rules\Classes\NoExtendsRule;
use Localheinz\PHPStan\Rules\Test\Fixture;
use Localheinz\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 */
final class NoExtendsRuleTest extends AbstractTestCase
{
    public function providerAnalysisSucceeds(): \Generator
    {
        $paths = [
            'class' => __DIR__ . '/../../Fixture/Classes/NoExtendsRule/Success/ExampleClass.php',
            'class-extending-php-unit-framework-test-case' => __DIR__ . '/../../Fixture/Classes/NoExtendsRule/Success/ClassExtendingPhpUnitFrameworkTestCase.php',
            'interface' => __DIR__ . '/../../Fixture/Classes/NoExtendsRule/Success/ExampleInterface.php',
            'interface-extending-other-interface' => __DIR__ . '/../../Fixture/Classes/NoExtendsRule/Success/InterfaceExtendingOtherInterface.php',
            'script-with-anonymous-class' => __DIR__ . '/../../Fixture/Classes/NoExtendsRule/Success/anonymous-class.php',
        ];

        foreach ($paths as $description => $path) {
            yield $description => [
                $path,
            ];
        }
    }

    public function providerAnalysisFails(): \Generator
    {
        $paths = [
            'class-extending-other-class' => [
                __DIR__ . '/../../Fixture/Classes/NoExtendsRule/Failure/ClassExtendingOtherClass.php',
                [
                    \sprintf(
                        'Class "%s" is not allowed to extend "%s".',
                        Fixture\Classes\NoExtendsRule\Failure\ClassExtendingOtherClass::class,
                        Fixture\Classes\NoExtendsRule\Failure\OtherClass::class
                    ),
                    7,
                ],
            ],
            'script-with-anonymous-class-extending-other-class' => [
                __DIR__ . '/../../Fixture/Classes/NoExtendsRule/Failure/anonymous-class-extending-other-class.php',
                [
                    \sprintf(
                        'Anonymous class is not allowed to extend "%s".',
                        Fixture\Classes\NoExtendsRule\Failure\OtherClass::class
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
        return new NoExtendsRule([]);
    }
}
