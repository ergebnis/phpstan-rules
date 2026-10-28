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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Closures;

use Ergebnis\PHPStan\Rules\Analyzer;
use Ergebnis\PHPStan\Rules\Closures;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Analyzer
 * @covers \Ergebnis\PHPStan\Rules\Closures\NoNullableReturnTypeDeclarationRule
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ErrorTip
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Parameter
 * @uses \Ergebnis\PHPStan\Rules\Documentation\RuleDefinition
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Closures\NoNullableReturnTypeDeclarationRule>
 */
final class NoNullableReturnTypeDeclarationRuleTest extends Testing\RuleTestCase
{
    use Test\Util\ErrorTip;
    use Test\Util\Helper;

    public function testNoNullableReturnTypeDeclarationRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Closures/NoNullableReturnTypeDeclarationRule'),
            [
                [
                    'Closure has a nullable return type declaration.',
                    15,
                    $this->errorTip(),
                ],
                [
                    'Closure has a nullable return type declaration.',
                    19,
                    $this->errorTip(),
                ],
                [
                    'Closure has a nullable return type declaration.',
                    23,
                    $this->errorTip(),
                ],
                [
                    'Closure has a nullable return type declaration.',
                    27,
                    $this->errorTip(),
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Closures\NoNullableReturnTypeDeclarationRule(new Analyzer());
    }
}
