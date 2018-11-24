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

namespace Localheinz\PHPStan\Rules\Test\Integration\Closures;

use Localheinz\PHPStan\Rules\Closures\NoParameterWithNullableTypeDeclarationRule;
use Localheinz\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 */
final class NoParameterWithNullableTypeDeclarationRuleTest extends AbstractTestCase
{
    public function providerAnalysisSucceeds(): \Generator
    {
        $paths = [
            'closure-with-parameter-with-type-declaration' => __DIR__ . '/../../Fixture/Closures/NoParameterWithNullableTypeDeclarationRule/Success/closure-with-parameter-with-type-declaration.php',
            'closure-with-parameter-without-type-declaration' => __DIR__ . '/../../Fixture/Closures/NoParameterWithNullableTypeDeclarationRule/Success/closure-with-parameter-without-type-declaration.php',
            'closure-without-parameters' => __DIR__ . '/../../Fixture/Closures/NoParameterWithNullableTypeDeclarationRule/Success/closure-without-parameters.php',
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
            'closure-with-parameter-with-nullable-type-declaration' => [
                __DIR__ . '/../../Fixture/Closures/NoParameterWithNullableTypeDeclarationRule/Failure/closure-with-parameter-with-nullable-type-declaration.php',
                [
                    'Parameter "$bar" of closure should not have a nullable type declaration.',
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
