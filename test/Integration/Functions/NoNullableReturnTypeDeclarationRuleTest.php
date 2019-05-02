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

use Localheinz\PHPStan\Rules\Functions\NoNullableReturnTypeDeclarationRule;
use Localheinz\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 *
 * @covers \Localheinz\PHPStan\Rules\Functions\NoNullableReturnTypeDeclarationRule
 */
final class NoNullableReturnTypeDeclarationRuleTest extends AbstractTestCase
{
    public function providerAnalysisSucceeds(): \Generator
    {
        $paths = [
            'function-with-return-type-declaration' => __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclarationRule/Success/function-with-return-type-declaration.php',
            'function-without-return-type-declaration' => __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclarationRule/Success/function-without-return-type-declaration.php',
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
            'function-with-nullable-return-type-declaration' => [
                __DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclarationRule/Failure/function-with-nullable-return-type-declaration.php',
                [
                    'Function Localheinz\PHPStan\Rules\Test\Fixture\Functions\NoNullableReturnTypeDeclarationRule\Failure\foo() has a nullable return type declaration.',
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
