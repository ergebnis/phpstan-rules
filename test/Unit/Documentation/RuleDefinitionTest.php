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
use Ergebnis\PHPStan\Rules\Test;
use PHPUnit\Framework;

/**
 * @covers \Ergebnis\PHPStan\Rules\Documentation\RuleDefinition
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSample
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSampleList
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ConfigurationKey
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Description
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Parameter
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterList
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Rationale
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Tip
 */
final class RuleDefinitionTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testCreateReturnsRuleDefinition(): void
    {
        $faker = self::faker();

        $configurationKey = Documentation\ConfigurationKey::fromString('noExtends');
        $description = Documentation\Description::fromString($faker->sentence());
        $rationale = Documentation\Rationale::fromString($faker->sentence());
        $tip = Documentation\Tip::fromString($faker->sentence());
        $parameters = Documentation\ParameterList::create(Documentation\Parameter::create(
            $faker->word(),
            Documentation\Description::fromString($faker->sentence()),
            $faker->boolean(),
        ));
        $codeSamples = Documentation\CodeSampleList::create(
            Documentation\CodeSample::reported($faker->sentence()),
            Documentation\CodeSample::notReported($faker->sentence()),
        );

        $ruleDefinition = Documentation\RuleDefinition::create(
            $configurationKey,
            $description,
            $rationale,
            $tip,
            $parameters,
            $codeSamples,
        );

        self::assertSame($configurationKey, $ruleDefinition->configurationKey());
        self::assertSame($description, $ruleDefinition->description());
        self::assertSame($rationale, $ruleDefinition->rationale());
        self::assertSame($tip, $ruleDefinition->tip());
        self::assertSame($parameters, $ruleDefinition->parameters());
        self::assertSame($codeSamples, $ruleDefinition->codeSamples());
    }
}
