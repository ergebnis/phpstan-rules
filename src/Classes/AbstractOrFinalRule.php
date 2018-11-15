<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller.
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
use PHPStan\ShouldNotHappenException;

final class AbstractOrFinalRule implements Rule
{
    /**
     * @var string[]
     */
    private $excludedClassNames;

    /**
     * @param string[] $excludedClassNames
     */
    public function __construct(array $excludedClassNames = [])
    {
        $this->excludedClassNames = \array_map(static function (string $excludedClassName): string {
            return $excludedClassName;
        }, $excludedClassNames);
    }

    public function getNodeType(): string
    {
        return Node\Stmt\Class_::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if (!$node instanceof Node\Stmt\Class_) {
            throw new ShouldNotHappenException();
        }

        if (!isset($node->namespacedName)
            || \in_array($node->namespacedName->toString(), $this->excludedClassNames, true)
            || $node->isAbstract()
            || $node->isFinal()
        ) {
            return [];
        }

        return [
            \sprintf(
                'Class "%s" should be marked as abstract or final.',
                $node->namespacedName
            ),
        ];
    }
}
