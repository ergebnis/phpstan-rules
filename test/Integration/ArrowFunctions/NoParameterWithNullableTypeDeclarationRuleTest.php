<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2026 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration\ArrowFunctions;

use Ergebnis\PHPStan\Rules\Analyzer;
use Ergebnis\PHPStan\Rules\ArrowFunctions;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Analyzer
 * @covers \Ergebnis\PHPStan\Rules\ArrowFunctions\NoParameterWithNullableTypeDeclarationRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<ArrowFunctions\NoParameterWithNullableTypeDeclarationRule>
 */
final class NoParameterWithNullableTypeDeclarationRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoParameterWithNullableTypeDeclarationRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/ArrowFunctions/NoParameterWithNullableTypeDeclarationRule'),
            [
                [
                    'Arrow function has parameter $bar with a nullable type declaration.',
                    13,
                ],
                [
                    'Arrow function has parameter $bar with a nullable type declaration.',
                    15,
                ],
                [
                    'Arrow function has parameter $bar with a nullable type declaration.',
                    17,
                ],
                [
                    'Arrow function has parameter $bar with a nullable type declaration.',
                    19,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new ArrowFunctions\NoParameterWithNullableTypeDeclarationRule(new Analyzer());
    }
}
