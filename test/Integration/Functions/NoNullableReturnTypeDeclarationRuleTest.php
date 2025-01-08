<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2025 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration\Functions;

use Ergebnis\PHPStan\Rules\Analyzer;
use Ergebnis\PHPStan\Rules\Functions;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Analyzer
 * @covers \Ergebnis\PHPStan\Rules\Functions\NoNullableReturnTypeDeclarationRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Functions\NoNullableReturnTypeDeclarationRule>
 */
final class NoNullableReturnTypeDeclarationRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoNullableReturnTypeDeclarationRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Functions/NoNullableReturnTypeDeclarationRule'),
            [
                [
                    'Function Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoNullableReturnTypeDeclarationRule\baz() has a nullable return type declaration.',
                    17,
                ],
                [
                    'Function Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoNullableReturnTypeDeclarationRule\quux() has a nullable return type declaration.',
                    22,
                ],
                [
                    'Function Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoNullableReturnTypeDeclarationRule\quz() has a nullable return type declaration.',
                    27,
                ],
                [
                    'Function Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoNullableReturnTypeDeclarationRule\corge() has a nullable return type declaration.',
                    32,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Functions\NoNullableReturnTypeDeclarationRule(new Analyzer());
    }
}
