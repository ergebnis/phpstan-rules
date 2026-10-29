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
use Ergebnis\PHPStan\Rules\Test;
use Ergebnis\Version;
use PHPUnit\Framework;

/**
 * @covers \Ergebnis\PHPStan\Rules\Documentation\ErrorTip
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSample
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSampleList
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ConfigurationKey
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Description
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterList
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Rationale
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Reference
 * @uses \Ergebnis\PHPStan\Rules\Documentation\RuleDefinition
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Tip
 * @uses \Ergebnis\PHPStan\Rules\Statements\NoSwitchRule
 */
final class ErrorTipTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testForReturnsTipWithoutBackticksFollowedByLinkToDocumentationOfRule(): void
    {
        $rule = new Statements\NoSwitchRule();

        $errorTip = Documentation\ErrorTip::for($rule);

        self::assertSame('Use `if` statements or `match` instead.', $rule->ruleDefinition()->tip()->toString());
        self::assertMatchesRegularExpression('@^Use if statements or match instead\. Learn more at https://github\.com/ergebnis/phpstan-rules/blob/(\d+\.\d+\.\d+|main)/doc/rules/Statements/NoSwitchRule\.md$@', $errorTip);
    }

    public function testForReferenceReturnsTipWithoutBackticksFollowedByLinkToDocumentationOfRuleForReference(): void
    {
        $rule = new Statements\NoSwitchRule();
        $reference = Documentation\Reference::fromVersion(Version\Version::fromString(self::faker()->numerify('#.#.#')));

        $errorTip = Documentation\ErrorTip::forReference(
            $rule,
            $reference,
        );

        $expected = \sprintf(
            'Use if statements or match instead. Learn more at https://github.com/ergebnis/phpstan-rules/blob/%s/doc/rules/Statements/NoSwitchRule.md',
            $reference->toString(),
        );

        self::assertSame($expected, $errorTip);
    }
}
