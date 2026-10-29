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

namespace Ergebnis\PHPStan\Rules\Test\Documentation;

use Ergebnis\PHPStan\Rules\Documentation;
use PHPStan\DependencyInjection;
use PHPUnit\Framework;
use Symfony\Component\Finder;

/**
 * @coversNothing
 */
final class RuleDefinitionTest extends Framework\TestCase
{
    private const NAMESPACE_PREFIX = 'Ergebnis\\PHPStan\\Rules\\';

    /**
     * @dataProvider provideRuleClassName
     */
    public function testRuleHasRuleDefinition(string $ruleClassName): void
    {
        self::assertTrue(\class_exists($ruleClassName));

        $rule = self::createContainer([])->getByType($ruleClassName);

        self::assertInstanceOf(Documentation\HasRuleDefinition::class, $rule);
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function provideRuleClassName(): iterable
    {
        foreach (self::ruleClassNames() as $ruleClassName) {
            yield $ruleClassName => [
                $ruleClassName,
            ];
        }
    }

    /**
     * Assigns a number to each configuration key, and creates one container for each bit of these numbers, where the
     * enabled parameter of a configuration key is true when its number has that bit set. A rule then needs to be enabled
     * in exactly the containers where the bit of the number of its configuration key is set, which identifies the
     * configuration key that enables the rule with fewer containers than one container for each configuration key.
     */
    public function testConfigurationKeyEnablesRule(): void
    {
        $configurationKeys = self::configurationKeys();

        $bitCount = \mb_strlen(\decbin(\count($configurationKeys) - 1));

        foreach (\range(0, $bitCount - 1) as $bit) {
            $configuration = [];

            foreach ($configurationKeys as $number => $configurationKey) {
                $configuration[$configurationKey] = [
                    'enabled' => self::hasBit(
                        $number,
                        $bit,
                    ),
                ];
            }

            $enabledRuleClassNames = self::enabledRuleClassNames(self::createContainer($configuration));

            foreach (self::ruleDefinitions() as $ruleClassName => $ruleDefinition) {
                $number = \array_search(
                    $ruleDefinition->configurationKey()->toString(),
                    $configurationKeys,
                    true,
                );

                self::assertIsInt($number);

                $expected = self::hasBit(
                    $number,
                    $bit,
                );

                $actual = \in_array(
                    $ruleClassName,
                    $enabledRuleClassNames,
                    true,
                );

                self::assertSame($expected, $actual, \sprintf(
                    'Failed asserting that the enabled parameter of configuration key "%s" enables rule "%s".',
                    $ruleDefinition->configurationKey()->toString(),
                    $ruleClassName,
                ));
            }
        }
    }

    public function testParameterExamplesAreValidConfiguration(): void
    {
        $configuration = [];

        foreach (self::ruleDefinitions() as $ruleDefinition) {
            foreach ($ruleDefinition->parameters()->toArray() as $parameter) {
                $configuration[$ruleDefinition->configurationKey()->toString()][$parameter->name()->toString()] = $parameter->example();
            }
        }

        /** @var array<string, array<string, mixed>> $parameters */
        $parameters = self::createContainer($configuration)->getParameter('ergebnis');

        foreach ($configuration as $configurationKey => $examples) {
            foreach ($examples as $name => $example) {
                if (!\is_array($example)) {
                    self::assertSame($example, $parameters[$configurationKey][$name]);

                    continue;
                }

                /**
                 * PHPStan appends values configured for a list parameter to its default values.
                 */
                $value = $parameters[$configurationKey][$name];

                self::assertIsArray($value);

                $actual = \array_slice(
                    $value,
                    -\count($example),
                );

                self::assertSame($example, $actual);
            }
        }
    }

    /**
     * @return list<string>
     */
    private static function configurationKeys(): array
    {
        $configurationKeys = \array_values(\array_unique(\array_map(static function (Documentation\RuleDefinition $ruleDefinition): string {
            return $ruleDefinition->configurationKey()->toString();
        }, self::ruleDefinitions())));

        \sort($configurationKeys);

        return $configurationKeys;
    }

    private static function hasBit(
        int $number,
        int $bit
    ): bool {
        return 0 !== ($number & (1 << $bit));
    }

    /**
     * @return list<string>
     */
    private static function ruleClassNames(): array
    {
        $finder = Finder\Finder::create()
            ->files()
            ->in(__DIR__ . '/../../src')
            ->name('*Rule.php');

        $ruleClassNames = \array_map(static function (Finder\SplFileInfo $fileInfo): string {
            return \sprintf(
                '%s%s',
                self::NAMESPACE_PREFIX,
                \str_replace(
                    '/',
                    '\\',
                    \mb_substr(
                        $fileInfo->getRelativePathname(),
                        0,
                        -4,
                    ),
                ),
            );
        }, \iterator_to_array($finder, false));

        \sort($ruleClassNames);

        return $ruleClassNames;
    }

    /**
     * @return array<string, Documentation\RuleDefinition>
     */
    private static function ruleDefinitions(): array
    {
        /** @var null|array<string, Documentation\RuleDefinition> $ruleDefinitions */
        static $ruleDefinitions;

        if (\is_array($ruleDefinitions)) {
            return $ruleDefinitions;
        }

        $container = self::createContainer([]);

        $ruleDefinitions = [];

        foreach (self::ruleClassNames() as $ruleClassName) {
            if (!\class_exists($ruleClassName)) {
                throw new \RuntimeException(\sprintf(
                    'Class "%s" does not exist.',
                    $ruleClassName,
                ));
            }

            $rule = $container->getByType($ruleClassName);

            if (!$rule instanceof Documentation\HasRuleDefinition) {
                continue;
            }

            $ruleDefinitions[$ruleClassName] = $rule->ruleDefinition();
        }

        return $ruleDefinitions;
    }

    /**
     * @return list<string>
     */
    private static function enabledRuleClassNames(DependencyInjection\Container $container): array
    {
        $enabledRuleClassNames = [];

        foreach ($container->getServicesByTag('phpstan.rules.rule') as $rule) {
            if (!\is_object($rule)) {
                continue;
            }

            $ruleClassName = \get_class($rule);

            if (0 !== \mb_strpos($ruleClassName, self::NAMESPACE_PREFIX)) {
                continue;
            }

            $enabledRuleClassNames[] = $ruleClassName;
        }

        return $enabledRuleClassNames;
    }

    /**
     * @param array<string, array<string, mixed>> $configuration
     */
    private static function createContainer(array $configuration): DependencyInjection\Container
    {
        $projectDirectory = __DIR__ . '/../..';

        $containerFactory = new DependencyInjection\ContainerFactory($projectDirectory);

        return $containerFactory->create(
            \sprintf(
                '%s/.build/phpunit/container/%s',
                $projectDirectory,
                \md5(\serialize($configuration)),
            ),
            [
                \sprintf(
                    '%s/rules.neon',
                    $projectDirectory,
                ),
            ],
            [],
            [],
            [],
            '0',
            null,
            null,
            null,
            null,
            [
                'ergebnis' => $configuration,
            ],
        );
    }
}
