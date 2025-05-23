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

namespace Ergebnis\PHPStan\Rules\Test\Integration\FunctionCalls;

use Ergebnis\PHPStan\Rules\FunctionCalls;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\FunctionCalls\NoNamedArgumentRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<FunctionCalls\NoNamedArgumentRule>
 */
final class NoNamedArgumentRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoNamedArgumentRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/FunctionCalls/NoNamedArgumentRule'),
            [
                [
                    'Function foo() is invoked with named argument for parameter $bar.',
                    20,
                ],
                [
                    'Function bar() is invoked with named argument for parameter $baz.',
                    28,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new FunctionCalls\NoNamedArgumentRule();
    }
}
