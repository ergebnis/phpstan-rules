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
 * @covers \Ergebnis\PHPStan\Rules\ArrowFunctions\NoParameterWithNullDefaultValueRule
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ErrorTip
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Parameter
 * @uses \Ergebnis\PHPStan\Rules\Documentation\RuleDefinition
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<ArrowFunctions\NoParameterWithNullDefaultValueRule>
 */
final class NoParameterWithNullDefaultValueRuleTest extends Testing\RuleTestCase
{
    use Test\Util\ErrorTip;
    use Test\Util\Helper;

    public function testNoParameterWithNullDefaultValueRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/ArrowFunctions/NoParameterWithNullDefaultValueRule'),
            [
                [
                    'Arrow function has parameter $bar with null as default value.',
                    13,
                    $this->errorTip(),
                ],
                [
                    'Arrow function has parameter $bar with null as default value.',
                    15,
                    $this->errorTip(),
                ],
                [
                    'Arrow function has parameter $bar with null as default value.',
                    17,
                    $this->errorTip(),
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new ArrowFunctions\NoParameterWithNullDefaultValueRule(new Analyzer());
    }
}
