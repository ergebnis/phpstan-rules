<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2021 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Classes\PHPUnit\Framework;

use PhpParser\Node;
use PHPStan\Analyser;
use PHPStan\Broker;
use PHPStan\Rules;
use PHPStan\ShouldNotHappenException;

final class TestCaseWithSuffixRule implements Rules\Rule
{
    /**
     * @var string[]
     */
    private static $phpunitTestCaseClassNames = [
        'PHPUnit\Framework\TestCase',
    ];

    /**
     * @var Broker\Broker
     */
    private $broker;

    public function __construct(Broker\Broker $broker)
    {
        $this->broker = $broker;
    }

    public function getNodeType(): string
    {
        return Node\Stmt\Class_::class;
    }

    public function processNode(Node $node, Analyser\Scope $scope): array
    {
        if (!$node instanceof Node\Stmt\Class_) {
            throw new ShouldNotHappenException(\sprintf(
                'Expected node to be instance of "%s", but got instance of "%s" instead.',
                Node\Stmt\Class_::class,
                \get_class($node)
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

        $classReflection = $this->broker->getClass($fullyQualifiedClassName);

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

        return [
            \sprintf(
                'Class %s extends %s, is concrete, but does not have a Test suffix.',
                $fullyQualifiedClassName,
                $extendedPhpunitTestCaseClassName
            ),
        ];
    }
}
