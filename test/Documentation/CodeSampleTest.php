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
use PhpParser\Node;
use PHPStan\Analyser;
use PHPStan\Rules;
use PHPStan\Testing;
use Symfony\Component\Finder;

/**
 * @coversNothing
 *
 * @extends Testing\RuleTestCase<Rules\Rule<Node>>
 */
final class CodeSampleTest extends Testing\RuleTestCase
{
    private const NAMESPACE_PREFIX = 'Ergebnis\\PHPStan\\Rules\\';
    private string $ruleClassName = '';

    /**
     * @dataProvider provideRuleClassNameAndCodeSample
     */
    public function testRuleReportsErrorForCodeSampleOnlyWhenCodeSampleIsReported(
        string $ruleClassName,
        Documentation\CodeSample $codeSample
    ): void {
        $this->ruleClassName = $ruleClassName;

        $directory = \sprintf(
            '%s/../../.build/phpunit/code-samples',
            __DIR__,
        );

        if (!\is_dir($directory)) {
            \mkdir(
                $directory,
                0755,
                true,
            );
        }

        $hash = \md5(\sprintf(
            '%s%s',
            $ruleClassName,
            $codeSample->code(),
        ));

        $file = \sprintf(
            '%s/%s.php',
            $directory,
            $hash,
        );

        /**
         * Moves symbols declared in the code sample into a namespace of their own, so that code samples can declare
         * symbols with the same names, and registers an autoloader that PHPStan can use to discover them.
         */
        $namespace = \sprintf(
            'Example\\Sample%s',
            $hash,
        );

        \file_put_contents(
            $file,
            \preg_replace(
                '/^namespace Example(\\\\|;)/m',
                \sprintf(
                    'namespace %s$1',
                    \str_replace(
                        '\\',
                        '\\\\',
                        $namespace,
                    ),
                ),
                $codeSample->code(),
            ),
        );

        $autoloader = static function (string $className) use ($file, $namespace): void {
            if (0 !== \mb_strpos($className, \sprintf('%s\\', $namespace))) {
                return;
            }

            require_once $file;
        };

        \spl_autoload_register($autoloader);

        $errors = $this->gatherAnalyserErrors([$file]);

        \spl_autoload_unregister($autoloader);

        $messages = \array_map(static function (Analyser\Error $error): string {
            return $error->getMessage();
        }, $errors);

        $messagesOfErrorsReportedByRule = \array_map(static function (Analyser\Error $error): string {
            return $error->getMessage();
        }, \array_filter($errors, static function (Analyser\Error $error): bool {
            $identifier = $error->getIdentifier();

            if (!\is_string($identifier)) {
                return false;
            }

            return 0 === \mb_strpos(
                $identifier,
                'ergebnis.',
            );
        }));

        if ($codeSample->isReported()) {
            self::assertNotSame([], $messagesOfErrorsReportedByRule, \sprintf(
                'Failed asserting that rule "%s" reports an error for code sample%s%s',
                $ruleClassName,
                \PHP_EOL,
                $codeSample->code(),
            ));

            return;
        }

        self::assertSame([], $messages, \sprintf(
            'Failed asserting that rule "%s" does not report an error for code sample%s%s',
            $ruleClassName,
            \PHP_EOL,
            $codeSample->code(),
        ));
    }

    /**
     * @return \Generator<string, array{0: string, 1: Documentation\CodeSample}>
     */
    public static function provideRuleClassNameAndCodeSample(): iterable
    {
        $container = self::getContainer();

        foreach (self::ruleClassNames() as $ruleClassName) {
            if (!\class_exists($ruleClassName)) {
                continue;
            }

            $rule = $container->getByType($ruleClassName);

            if (!$rule instanceof Documentation\HasRuleDefinition) {
                continue;
            }

            foreach ($rule->ruleDefinition()->codeSamples() as $index => $codeSample) {
                $key = \sprintf(
                    '%s, code sample %d (not reported)',
                    $ruleClassName,
                    $index + 1,
                );

                if ($codeSample->isReported()) {
                    $key = \sprintf(
                        '%s, code sample %d (reported)',
                        $ruleClassName,
                        $index + 1,
                    );
                }

                yield $key => [
                    $ruleClassName,
                    $codeSample,
                ];
            }
        }
    }

    public static function getAdditionalConfigFiles(): array
    {
        return [
            __DIR__ . '/../../rules.neon',
            __DIR__ . '/../Integration/PropertyHooks/phpstan.neon',
        ];
    }

    /**
     * @return Rules\Rule<Node>
     */
    protected function getRule(): Rules\Rule
    {
        if (!\class_exists($this->ruleClassName)) {
            throw new \RuntimeException(\sprintf(
                'Class "%s" does not exist.',
                $this->ruleClassName,
            ));
        }

        $rule = self::getContainer()->getByType($this->ruleClassName);

        if (!$rule instanceof Rules\Rule) {
            throw new \RuntimeException(\sprintf(
                'Class "%s" does not implement "%s".',
                $this->ruleClassName,
                Rules\Rule::class,
            ));
        }

        return $rule;
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
}
