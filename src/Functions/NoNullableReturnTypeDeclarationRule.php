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

namespace Localheinz\PHPStan\Rules\Functions;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;

final class NoNullableReturnTypeDeclarationRule implements Rule
{
    public function getNodeType(): string
    {
        return Node\Stmt\Function_::class;
    }

    /**
     * @param Node\Stmt\Function_ $node
     * @param Scope               $scope
     *
     * @return array
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!isset($node->namespacedName) || !$node->getReturnType() instanceof Node\NullableType) {
            return [];
        }

        return [
            \sprintf(
                'Function "%s()" should not have a nullable return type declaration.',
                $node->namespacedName
            ),
        ];
    }
}
