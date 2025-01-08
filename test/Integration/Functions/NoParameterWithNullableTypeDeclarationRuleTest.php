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
 * @covers \Ergebnis\PHPStan\Rules\Functions\NoParameterWithNullableTypeDeclarationRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Functions\NoParameterWithNullableTypeDeclarationRule>
 */
final class NoParameterWithNullableTypeDeclarationRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoParameterWithNullableTypeDeclarationRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Functions/NoParameterWithNullableTypeDeclarationRule'),
            [
                [
                    'Function Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoParameterWithNullableTypeDeclarationRule\qux() has parameter $bar with a nullable type declaration.',
                    21,
                ],
                [
                    'Function Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoParameterWithNullableTypeDeclarationRule\quux() has parameter $bar with a nullable type declaration.',
                    26,
                ],
                [
                    'Function Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoParameterWithNullableTypeDeclarationRule\quz() has parameter $bar with a nullable type declaration.',
                    31,
                ],
                [
                    'Function Ergebnis\PHPStan\Rules\Test\Fixture\Functions\NoParameterWithNullableTypeDeclarationRule\corge() has parameter $bar with a nullable type declaration.',
                    36,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Functions\NoParameterWithNullableTypeDeclarationRule(new Analyzer());
    }
}
