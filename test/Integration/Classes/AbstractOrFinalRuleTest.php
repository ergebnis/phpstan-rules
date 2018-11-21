<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/phpstan-rules
 */

namespace Localheinz\PHPStan\Rules\Test\Integration\Classes;

use Localheinz\PHPStan\Rules\Classes\AbstractOrFinalRule;
use Localheinz\PHPStan\Rules\Test\Fixture;
use Localheinz\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 */
final class AbstractOrFinalRuleTest extends AbstractTestCase
{
    public function providerAnalysisSucceeds(): \Generator
    {
        $paths = [
            'abstract-class' => __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/Success/AbstractClass.php',
            'abstract-class-with-anonymous-class' => __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/Success/AbstractClassWithAnonymousClass.php',
            'class-neither-abstract-nor-final-but-whitelisted' => __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/Success/NeitherAbstractNorFinalClassButWhitelisted.php',
            'final-class' => __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/Success/FinalClass.php',
            'final-class-with-anonymous-class' => __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/Success/FinalClassWithAnonymousClass.php',
            'interface' => __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/Success/ExampleInterface.php',
            'script-with-anonymous-class' => __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/Success/script-with-anonymous-class.php',
            'trait' => __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/Success/ExampleTrait.php',
            'trait-with-anonymous-class' => __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/Success/TraitWithAnonymousClass.php',
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
            'class-neither-abstract-nor-final' => [
                __DIR__ . '/../../Fixture/Classes/AbstractOrFinalRule/Failure/NeitherAbstractNorFinalClass.php',
                [
                    \sprintf(
                        'Class "%s" should be marked as abstract or final.',
                        Fixture\Classes\AbstractOrFinalRule\Failure\NeitherAbstractNorFinalClass::class
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
        return new AbstractOrFinalRule([
            Fixture\Classes\AbstractOrFinalRule\Success\NeitherAbstractNorFinalClassButWhitelisted::class,
        ]);
    }
}
