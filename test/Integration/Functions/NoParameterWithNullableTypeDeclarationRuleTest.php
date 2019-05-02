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

namespace Localheinz\PHPStan\Rules\Test\Integration\Functions;

use Localheinz\PHPStan\Rules\Functions\NoParameterWithNullableTypeDeclarationRule;
use Localheinz\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 *
 * @covers \Localheinz\PHPStan\Rules\Functions\NoParameterWithNullableTypeDeclarationRule
 */
final class NoParameterWithNullableTypeDeclarationRuleTest extends AbstractTestCase
{
    public function providerAnalysisSucceeds(): \Generator
    {
        $paths = [
            'function-with-parameter-with-type-declaration' => __DIR__ . '/../../Fixture/Functions/NoParameterWithNullableTypeDeclarationRule/Success/function-with-parameter-with-type-declaration.php',
            'function-with-parameter-without-type-declaration' => __DIR__ . '/../../Fixture/Functions/NoParameterWithNullableTypeDeclarationRule/Success/function-with-parameter-without-type-declaration.php',
            'function-without-parameters' => __DIR__ . '/../../Fixture/Functions/NoParameterWithNullableTypeDeclarationRule/Success/function-without-parameters.php',
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
            'function-with-parameter-with-nullable-type-declaration' => [
                __DIR__ . '/../../Fixture/Functions/NoParameterWithNullableTypeDeclarationRule/Failure/function-with-parameter-with-nullable-type-declaration.php',
                [
                    'Function Localheinz\PHPStan\Rules\Test\Fixture\Functions\NoParameterWithNullableTypeDeclarationRule\Failure\foo() has parameter $bar with a nullable type declaration.',
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
        return new NoParameterWithNullableTypeDeclarationRule();
    }
}
