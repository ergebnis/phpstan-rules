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

use Ergebnis\PHPStan\Rules\Documentation;
use PHPStan\DependencyInjection;
use Symfony\Component\Finder;

require_once __DIR__ . '/../vendor/autoload.php';

(static function (): void {
    $documentationGenerator = new class() {
        private const NAMESPACE_PREFIX = 'Ergebnis\\PHPStan\\Rules\\';
        private string $projectDirectory;

        public function __construct()
        {
            $projectDirectory = \realpath(__DIR__ . '/..');

            if (!\is_string($projectDirectory)) {
                throw new \RuntimeException('Could not determine project directory.');
            }

            $this->projectDirectory = $projectDirectory;
        }

        public function run(): void
        {
            $containerFactory = new DependencyInjection\ContainerFactory($this->projectDirectory);

            $container = $containerFactory->create(
                \sprintf(
                    '%s/.build/generate-documentation',
                    $this->projectDirectory,
                ),
                [
                    \sprintf(
                        '%s/rules.neon',
                        $this->projectDirectory,
                    ),
                ],
                [],
            );

            /** @var array<string, array<string, mixed>> $configuration */
            $configuration = $container->getParameter('ergebnis');

            $ruleDefinitions = [];

            foreach ($this->ruleClassNames() as $ruleClassName) {
                /** @var class-string $ruleClassName */
                $rule = $container->getByType($ruleClassName);

                if (!$rule instanceof Documentation\HasRuleDefinition) {
                    throw new \RuntimeException(\sprintf(
                        'Rule "%s" does not implement "%s".',
                        $ruleClassName,
                        Documentation\HasRuleDefinition::class,
                    ));
                }

                $ruleDefinitions[$ruleClassName] = $rule->ruleDefinition();
            }

            $ruleClassNamesByConfigurationKey = [];

            foreach ($ruleDefinitions as $ruleClassName => $ruleDefinition) {
                $ruleClassNamesByConfigurationKey[$ruleDefinition->configurationKey()][] = $ruleClassName;
            }

            $documentationDirectory = \sprintf(
                '%s/doc/rules',
                $this->projectDirectory,
            );

            self::removeDirectory($documentationDirectory);

            foreach ($ruleDefinitions as $ruleClassName => $ruleDefinition) {
                $documentationPath = \sprintf(
                    '%s/%s',
                    $this->projectDirectory,
                    self::documentationPath($ruleClassName),
                );

                $directory = \dirname($documentationPath);

                if (!\is_dir($directory)) {
                    \mkdir(
                        $directory,
                        0755,
                        true,
                    );
                }

                $configurationKey = $ruleDefinition->configurationKey();

                if (!\array_key_exists($configurationKey, $configuration)) {
                    throw new \RuntimeException(\sprintf(
                        'Rule "%s" refers to configuration key "%s", but parameters.ergebnis does not contain it.',
                        $ruleClassName,
                        $configurationKey,
                    ));
                }

                \file_put_contents(
                    $documentationPath,
                    self::documentationFor(
                        $ruleClassName,
                        $ruleDefinition,
                        $configuration[$configurationKey],
                        $ruleClassNamesByConfigurationKey[$configurationKey],
                    ),
                );

                echo \sprintf(
                    'Generated %s%s',
                    self::documentationPath($ruleClassName),
                    \PHP_EOL,
                );
            }

            $this->updateReadme($ruleDefinitions);

            echo \sprintf(
                'Updated README.md%s',
                \PHP_EOL,
            );
        }

        /**
         * @return list<string>
         */
        private function ruleClassNames(): array
        {
            $finder = Finder\Finder::create()
                ->files()
                ->in(\sprintf(
                    '%s/src',
                    $this->projectDirectory,
                ))
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

        private static function shortName(string $ruleClassName): string
        {
            return \mb_substr(
                $ruleClassName,
                \mb_strlen(self::NAMESPACE_PREFIX),
            );
        }

        private static function namespace(string $ruleClassName): string
        {
            $shortName = self::shortName($ruleClassName);

            return \mb_substr(
                $shortName,
                0,
                (int) \mb_strpos(
                    $shortName,
                    '\\',
                ),
            );
        }

        private static function documentationPath(string $ruleClassName): string
        {
            return \sprintf(
                'doc/rules/%s.md',
                \str_replace(
                    '\\',
                    '/',
                    self::shortName($ruleClassName),
                ),
            );
        }

        /**
         * @param array<string, mixed> $configuration
         * @param list<string>         $ruleClassNamesSharingConfigurationKey
         */
        private static function documentationFor(
            string $ruleClassName,
            Documentation\RuleDefinition $ruleDefinition,
            array $configuration,
            array $ruleClassNamesSharingConfigurationKey
        ): string {
            $configurationKey = $ruleDefinition->configurationKey();

            $pathToProjectDirectory = \str_repeat(
                '../',
                \mb_substr_count(
                    self::documentationPath($ruleClassName),
                    '/',
                ),
            );

            $lines = [];

            $lines[] = \sprintf(
                '# `%s`',
                self::shortName($ruleClassName),
            );
            $lines[] = '';
            $lines[] = $ruleDefinition->description();
            $lines[] = '';
            $lines[] = '## Rationale';
            $lines[] = '';
            $lines[] = $ruleDefinition->rationale();
            $lines[] = '';
            $lines[] = '## Parameters';
            $lines[] = '';
            $lines[] = '### `enabled`';
            $lines[] = '';
            $lines[] = \sprintf(
                'By default, this rule is enabled, unless you set the [`allRules`](%sREADME.md#disabling-all-rules) parameter to `false`.',
                $pathToProjectDirectory,
            );
            $lines[] = '';
            $lines[] = 'You can set the `enabled` parameter to `false` to disable this rule.';
            $lines[] = '';
            $lines[] = self::neonExample(
                $configurationKey,
                'enabled',
                false,
            );
            $lines[] = '';

            $otherRuleClassNames = \array_values(\array_filter($ruleClassNamesSharingConfigurationKey, static function (string $otherRuleClassName) use ($ruleClassName): bool {
                return $otherRuleClassName !== $ruleClassName;
            }));

            if ([] !== $otherRuleClassNames) {
                $lines[] = \sprintf(
                    '💡 The `enabled` parameter for `%s` also enables or disables the following rules:',
                    $configurationKey,
                );
                $lines[] = '';

                foreach ($otherRuleClassNames as $otherRuleClassName) {
                    $lines[] = \sprintf(
                        '- [`%s`](%s%s)',
                        self::shortName($otherRuleClassName),
                        $pathToProjectDirectory,
                        self::documentationPath($otherRuleClassName),
                    );
                }

                $lines[] = '';
            }

            foreach ($ruleDefinition->parameters() as $parameter) {
                $name = $parameter->name();

                if (!\array_key_exists($name, $configuration)) {
                    throw new \RuntimeException(\sprintf(
                        'Rule "%s" documents parameter "%s", but parameters.ergebnis.%s does not contain it.',
                        $ruleClassName,
                        $name,
                        $configurationKey,
                    ));
                }

                $lines[] = \sprintf(
                    '### `%s`',
                    $name,
                );
                $lines[] = '';
                $lines[] = $parameter->description();
                $lines[] = '';
                $lines[] = \sprintf(
                    'Default value: `%s`',
                    self::inlineNeonValue($configuration[$name]),
                );
                $lines[] = '';
                $lines[] = 'Example:';
                $lines[] = '';
                $lines[] = self::neonExample(
                    $configurationKey,
                    $name,
                    $parameter->example(),
                );
                $lines[] = '';
            }

            return \implode(
                "\n",
                $lines,
            );
        }

        /**
         * @param mixed $value
         */
        private static function neonExample(
            string $configurationKey,
            string $name,
            $value
        ): string {
            $lines = [];

            $lines[] = '```neon';
            $lines[] = 'parameters:';
            $lines[] = "\tergebnis:";
            $lines[] = \sprintf(
                "\t\t%s:",
                $configurationKey,
            );

            $valueLines = self::neonLines(
                $name,
                $value,
                "\t\t\t",
            );

            foreach ($valueLines as $line) {
                $lines[] = $line;
            }

            $lines[] = '```';

            return \implode(
                "\n",
                $lines,
            );
        }

        /**
         * @param mixed $value
         *
         * @return list<string>
         */
        private static function neonLines(
            string $key,
            $value,
            string $indentation
        ): array {
            if (
                !\is_array($value)
                || [] === $value
            ) {
                return [
                    \sprintf(
                        '%s%s: %s',
                        $indentation,
                        $key,
                        self::inlineNeonValue($value),
                    ),
                ];
            }

            $lines = [
                \sprintf(
                    '%s%s:',
                    $indentation,
                    $key,
                ),
            ];

            foreach ($value as $element) {
                if (!\is_array($element)) {
                    $lines[] = \sprintf(
                        "%s\t- %s",
                        $indentation,
                        self::inlineNeonValue($element),
                    );

                    continue;
                }

                $lines[] = \sprintf(
                    "%s\t-",
                    $indentation,
                );

                $elementIndentation = \sprintf(
                    "%s\t\t",
                    $indentation,
                );

                foreach ($element as $elementKey => $elementValue) {
                    $elementLines = self::neonLines(
                        (string) $elementKey,
                        $elementValue,
                        $elementIndentation,
                    );

                    foreach ($elementLines as $line) {
                        $lines[] = $line;
                    }
                }
            }

            return $lines;
        }

        /**
         * @param mixed $value
         */
        private static function inlineNeonValue($value): string
        {
            if (\is_bool($value)) {
                if ($value) {
                    return 'true';
                }

                return 'false';
            }

            if (\is_array($value)) {
                return \sprintf(
                    '[%s]',
                    \implode(
                        ', ',
                        \array_map(static function ($element): string {
                            return self::inlineNeonValue($element);
                        }, $value),
                    ),
                );
            }

            if (!\is_string($value)) {
                throw new \RuntimeException(\sprintf(
                    'Can not format value of type "%s".',
                    \gettype($value),
                ));
            }

            /**
             * @see https://ne-on.org
             */
            $keywords = [
                'false',
                'no',
                'null',
                'off',
                'on',
                'true',
                'yes',
            ];

            if (
                1 === \preg_match('/^[A-Za-z_][A-Za-z0-9_\\\\]*$/', $value)
                && !\in_array(\mb_strtolower($value), $keywords, true)
            ) {
                return $value;
            }

            return \sprintf(
                "'%s'",
                \str_replace(
                    "'",
                    "''",
                    $value,
                ),
            );
        }

        /**
         * @param array<string, Documentation\RuleDefinition> $ruleDefinitions
         */
        private function updateReadme(array $ruleDefinitions): void
        {
            $readmePath = \sprintf(
                '%s/README.md',
                $this->projectDirectory,
            );

            $content = \file_get_contents($readmePath);

            if (!\is_string($content)) {
                throw new \RuntimeException(\sprintf(
                    'Could not read "%s".',
                    $readmePath,
                ));
            }

            $beginMarker = '<!-- BEGIN RULES -->';
            $endMarker = '<!-- END RULES -->';

            $beginPosition = \mb_strpos(
                $content,
                $beginMarker,
            );

            $endPosition = \mb_strpos(
                $content,
                $endMarker,
            );

            if (
                false === $beginPosition
                || false === $endPosition
            ) {
                throw new \RuntimeException(\sprintf(
                    'Could not find markers "%s" and "%s" in "%s".',
                    $beginMarker,
                    $endMarker,
                    $readmePath,
                ));
            }

            $lines = [];

            $lines[] = 'This package provides the following rules for use with [`phpstan/phpstan`](https://github.com/phpstan/phpstan):';
            $lines[] = '';

            foreach (\array_keys($ruleDefinitions) as $ruleClassName) {
                $lines[] = \sprintf(
                    '- [`%s`](#%s)',
                    $ruleClassName,
                    \mb_strtolower(\str_replace(
                        '\\',
                        '',
                        self::shortName($ruleClassName),
                    )),
                );
            }

            $lines[] = '';

            $namespace = null;

            foreach ($ruleDefinitions as $ruleClassName => $ruleDefinition) {
                if (self::namespace($ruleClassName) !== $namespace) {
                    $namespace = self::namespace($ruleClassName);

                    $lines[] = \sprintf(
                        '### %s',
                        $namespace,
                    );
                    $lines[] = '';
                }

                $lines[] = \sprintf(
                    '#### `%s`',
                    self::shortName($ruleClassName),
                );
                $lines[] = '';
                $lines[] = $ruleDefinition->description();
                $lines[] = '';
                $lines[] = \sprintf(
                    '💡 Find out more in the rule documentation for [`%s`](%s).',
                    self::shortName($ruleClassName),
                    self::documentationPath($ruleClassName),
                );
                $lines[] = '';
            }

            $updatedContent = \sprintf(
                "%s\n\n%s\n%s",
                \mb_substr(
                    $content,
                    0,
                    $beginPosition + \mb_strlen($beginMarker),
                ),
                \implode(
                    "\n",
                    $lines,
                ),
                \mb_substr(
                    $content,
                    $endPosition,
                ),
            );

            \file_put_contents(
                $readmePath,
                $updatedContent,
            );
        }

        private static function removeDirectory(string $directory): void
        {
            if (!\is_dir($directory)) {
                return;
            }

            $finder = Finder\Finder::create()
                ->in($directory)
                ->sort(static function (\SplFileInfo $a, \SplFileInfo $b): int {
                    return \mb_strlen($b->getPathname()) <=> \mb_strlen($a->getPathname());
                });

            $fileInfos = \iterator_to_array(
                $finder,
                false,
            );

            foreach ($fileInfos as $fileInfo) {
                if ($fileInfo->isDir()) {
                    \rmdir($fileInfo->getPathname());

                    continue;
                }

                \unlink($fileInfo->getPathname());
            }

            \rmdir($directory);
        }
    };

    $documentationGenerator->run();
})();
