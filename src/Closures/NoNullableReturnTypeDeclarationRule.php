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

namespace Localheinz\PHPStan\Rules\Closures;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;

final class NoNullableReturnTypeDeclarationRule implements Rule
{
    public function getNodeType(): string
    {
        return Node\Expr\Closure::class;
    }

    /**
     * @param Node\Expr\Closure $node
     * @param Scope             $scope
     *
     * @return array
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$node->getReturnType() instanceof Node\NullableType) {
            return [];
        }

        return [
            'Closure has a nullable return type declaration.',
        ];
    }
}
