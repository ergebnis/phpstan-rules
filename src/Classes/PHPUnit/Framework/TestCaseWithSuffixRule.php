<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2024 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Classes\PHPUnit\Framework;

use PhpParser\Node;
use PHPStan\Analyser;
use PHPStan\Reflection;
use PHPStan\Rules;
use PHPStan\ShouldNotHappenException;

/**
 * @implements Rules\Rule<Node\Stmt\Class_>
 */
final class TestCaseWithSuffixRule implements Rules\Rule
{
    /**
     * @var array<int, class-string>
     */
    private static array $phpunitTestCaseClassNames = [
        'PHPUnit\Framework\TestCase',
    ];
    private readonly Reflection\ReflectionProvider $reflectionProvider;

    public function __construct(Reflection\ReflectionProvider $reflectionProvider)
    {
        $this->reflectionProvider = $reflectionProvider;
    }

    public function getNodeType(): string
    {
        return Node\Stmt\Class_::class;
    }

    public function processNode(
        Node $node,
        Analyser\Scope $scope,
    ): array {
        if (!$node instanceof Node\Stmt\Class_) {
            throw new ShouldNotHappenException(\sprintf(
                'Expected node to be instance of "%s", but got instance of "%s" instead.',
                Node\Stmt\Class_::class,
                $node::class,
            ));
        }

        if ($node->isAbstract()) {
            return [];
        }

        if (!$node->extends instanceof Node\Name) {
            return [];
        }

        if (!isset($node->namespacedName)) {
            return [];
        }

        /** @var string $fullyQualifiedClassName */
        $fullyQualifiedClassName = $node->namespacedName->toString();

        $classReflection = $this->reflectionProvider->getClass($fullyQualifiedClassName);

        $extendedPhpunitTestCaseClassName = '';

        foreach (self::$phpunitTestCaseClassNames as $phpunitTestCaseClassName) {
            if ($classReflection->isSubclassOf($phpunitTestCaseClassName)) {
                $extendedPhpunitTestCaseClassName = $phpunitTestCaseClassName;

                break;
            }
        }

        if ('' === $extendedPhpunitTestCaseClassName) {
            return [];
        }

        if (1 === \preg_match('/Test$/', $fullyQualifiedClassName)) {
            return [];
        }

        $ruleErrorBuilder = Rules\RuleErrorBuilder::message(\sprintf(
            'Class %s extends %s, is concrete, but does not have a Test suffix.',
            $fullyQualifiedClassName,
            $extendedPhpunitTestCaseClassName,
        ));

        return [
            $ruleErrorBuilder->build(),
        ];
    }
}
