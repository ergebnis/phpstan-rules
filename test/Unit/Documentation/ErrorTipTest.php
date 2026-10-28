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

namespace Ergebnis\PHPStan\Rules\Test\Unit\Documentation;

use Ergebnis\PHPStan\Rules\Documentation;
use Ergebnis\PHPStan\Rules\Statements;
use PHPUnit\Framework;

/**
 * @covers \Ergebnis\PHPStan\Rules\Documentation\ErrorTip
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSample
 * @uses \Ergebnis\PHPStan\Rules\Documentation\RuleDefinition
 * @uses \Ergebnis\PHPStan\Rules\Statements\NoSwitchRule
 */
final class ErrorTipTest extends Framework\TestCase
{
    public function testForReturnsTipWithoutBackticksFollowedByLinkToDocumentationOfRule(): void
    {
        $rule = new Statements\NoSwitchRule();

        $errorTip = Documentation\ErrorTip::for($rule);

        self::assertSame('Use `if` statements or `match` instead.', $rule->ruleDefinition()->tip());
        self::assertMatchesRegularExpression('@^Use if statements or match instead\. Learn more at https://github\.com/ergebnis/phpstan-rules/blob/[^/]+/doc/rules/Statements/NoSwitchRule\.md$@', $errorTip);
    }
}
