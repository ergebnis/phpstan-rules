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
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Parameter
 */
final class RuleDefinitionTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testCreateReturnsRuleDefinitionWithoutParameters(): void
    {
        $faker = self::faker();

        $configurationKey = $faker->word();
        $description = $faker->sentence();
        $rationale = $faker->sentence();
        $tip = $faker->sentence();

        $ruleDefinition = Documentation\RuleDefinition::create(
            $configurationKey,
            $description,
            $rationale,
            $tip,
        );

        self::assertSame($configurationKey, $ruleDefinition->configurationKey());
        self::assertSame($description, $ruleDefinition->description());
        self::assertSame($rationale, $ruleDefinition->rationale());
        self::assertSame($tip, $ruleDefinition->tip());
        self::assertSame([], $ruleDefinition->parameters());
        self::assertSame([], $ruleDefinition->codeSamples());
    }

    public function testCreateReturnsRuleDefinitionWithParameters(): void
    {
        $faker = self::faker();

        $configurationKey = $faker->word();
        $description = $faker->sentence();
        $rationale = $faker->sentence();
        $tip = $faker->sentence();
        $parameterOne = Documentation\Parameter::create(
            $faker->word(),
            $faker->sentence(),
            $faker->boolean(),
        );
        $parameterTwo = Documentation\Parameter::create(
            $faker->word(),
            $faker->sentence(),
            [
                $faker->word(),
                $faker->word(),
            ],
        );

        $ruleDefinition = Documentation\RuleDefinition::create(
            $configurationKey,
            $description,
            $rationale,
            $tip,
            $parameterOne,
            $parameterTwo,
        );

        $expected = [
            $parameterOne,
            $parameterTwo,
        ];

        self::assertSame($configurationKey, $ruleDefinition->configurationKey());
        self::assertSame($description, $ruleDefinition->description());
        self::assertSame($rationale, $ruleDefinition->rationale());
        self::assertSame($tip, $ruleDefinition->tip());
        self::assertSame($expected, $ruleDefinition->parameters());
    }

    public function testWithCodeSamplesReturnsRuleDefinitionWithCodeSamples(): void
    {
        $faker = self::faker();

        $ruleDefinition = Documentation\RuleDefinition::create(
            $faker->word(),
            $faker->sentence(),
            $faker->sentence(),
            $faker->sentence(),
        );

        $codeSampleOne = Documentation\CodeSample::reported($faker->sentence());
        $codeSampleTwo = Documentation\CodeSample::notReported($faker->sentence());

        $mutated = $ruleDefinition->withCodeSamples(
            $codeSampleOne,
            $codeSampleTwo,
        );

        $expected = [
            $codeSampleOne,
            $codeSampleTwo,
        ];

        self::assertNotSame($ruleDefinition, $mutated);
        self::assertSame([], $ruleDefinition->codeSamples());
        self::assertSame($ruleDefinition->configurationKey(), $mutated->configurationKey());
        self::assertSame($ruleDefinition->description(), $mutated->description());
        self::assertSame($ruleDefinition->rationale(), $mutated->rationale());
        self::assertSame($ruleDefinition->tip(), $mutated->tip());
        self::assertSame($ruleDefinition->parameters(), $mutated->parameters());
        self::assertSame($expected, $mutated->codeSamples());
    }
}
