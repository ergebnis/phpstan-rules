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
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @internal
 */
final class NoNullableReturnTypeDeclarationRuleTest extends RuleTestCase
{
    /**
     * @dataProvider providerAnalysisDoesNotResultInErrors
     *
     * @param string $path
     */
    public function testAnalysisDoesNotResultInErrors(string $path): void
    {
        $this->analyse(
            [
                $path,
            ],
            []
        );
    }

    public function providerAnalysisDoesNotResultInErrors(): \Generator
    {
        $paths = [
            // anonymous functions are not supported, apparently
            'anonymous-function-in-script-with-nullable-return-type-declaration' => __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclaration/anonymous-function-in-script-with-nullable-return-type-declaration.php',
            'anonymous-function-in-script-with-return-type-declaration' => __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclaration/anonymous-function-in-script-with-return-type-declaration.php',
            'anonymous-function-in-script-without-return-type-declaration' => __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclaration/anonymous-function-in-script-without-return-type-declaration.php',
            'named-function-in-script-with-return-type-declaration' => __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclaration/named-function-in-script-with-return-type-declaration.php',
            'named-function-in-script-without-return-type-declaration' => __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclaration/named-function-in-script-without-return-type-declaration.php',
        ];

        foreach ($paths as $description => $path) {
            yield $description => [
                $path,
            ];
        }
    }

    /**
     * @dataProvider providerAnalysisResultsInErrors
     *
     * @param string $path
     * @param array  $error
     */
    public function testAnalysisResultsInErrors(string $path, array $error): void
    {
        $this->analyse(
            [
                $path,
            ],
            [
                $error,
            ]
        );
    }

    public function providerAnalysisResultsInErrors(): \Generator
    {
        $paths = [
            'named-function-in-script-with-nullable-return-type-declaration' => [
                __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclaration/named-function-in-script-with-nullable-return-type-declaration.php',
                [
                    'Function "Localheinz\PHPStan\Rules\Test\Fixture\Functions\NoNullablReturnTypeDeclaration\foo()" should not have a nullable return type declaration.',
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
