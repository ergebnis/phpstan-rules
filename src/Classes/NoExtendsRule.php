<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/phpstan-rules
 */

namespace Localheinz\PHPStan\Rules\Classes;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;

final class NoExtendsRule implements Rule
{
    /**
     * @var string[]
     */
    private $classesAllowedToBeExtended;

    /**
     * @param string[] $classesAllowedToBeExtended
     */
    public function __construct(array $classesAllowedToBeExtended)
    {
        $this->classesAllowedToBeExtended = \array_map(static function (string $classAllowedToBeExtended): string {
            return $classAllowedToBeExtended;
        }, $classesAllowedToBeExtended);
    }

    public function getNodeType(): string
    {
        return Node\Stmt\Class_::class;
    }

    /**
     * @param Node\Stmt\Class_ $node
     * @param Scope            $scope
     *
     * @return array
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$node->extends instanceof Node\Name) {
            return [];
        }

        $extendedClassName = $node->extends->toString();

        if (\in_array($extendedClassName, $this->classesAllowedToBeExtended, true)) {
            return [];
        }

        if (!isset($node->namespacedName)) {
            return [
                \sprintf(
                    'Anonymous class is not allowed to extend "%s".',
                    $extendedClassName
                ),
            ];
        }

        return [
            \sprintf(
                'Class "%s" is not allowed to extend "%s".',
                $node->namespacedName,
                $extendedClassName
            ),
        ];
    }
}
