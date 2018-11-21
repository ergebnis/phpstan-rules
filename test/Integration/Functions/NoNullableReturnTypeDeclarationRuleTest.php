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

namespace Localheinz\PHPStan\Rules\Test\Integration\Functions;

use Localheinz\PHPStan\Rules\Functions\NoNullableReturnTypeDeclarationRule;
use Localheinz\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 */
final class NoNullableReturnTypeDeclarationRuleTest extends AbstractTestCase
{
    public function providerAnalysisSucceeds(): \Generator
    {
        $paths = [
            // anonymous functions are not supported, apparently
            'anonymous-function-with-nullable-return-type-declaration' => __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclaration/Success/anonymous-function-with-nullable-return-type-declaration.php',
            'anonymous-function-with-return-type-declaration' => __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclaration/Success/anonymous-function-with-return-type-declaration.php',
            'anonymous-function-without-return-type-declaration' => __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclaration/Success/anonymous-function-without-return-type-declaration.php',
            'named-function-with-return-type-declaration' => __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclaration/Success/named-function-with-return-type-declaration.php',
            'named-function-without-return-type-declaration' => __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclaration/Success/named-function-without-return-type-declaration.php',
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
            'named-function-in-script-with-nullable-return-type-declaration' => [
                __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclaration/Failure/named-function-with-nullable-return-type-declaration.php',
                [
                    'Function "Localheinz\PHPStan\Rules\Test\Fixture\Functions\NoNullablReturnTypeDeclaration\Failure\foo()" should not have a nullable return type declaration.',
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
        return new NoNullableReturnTypeDeclarationRule();
    }
}
