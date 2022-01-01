<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2022 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Functions;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\ShouldNotHappenException;

final class NoNullableReturnTypeDeclarationRule implements Rule
{
    public function getNodeType(): string
    {
        return Node\Stmt\Function_::class;
    }

    public function processNode(
        Node $node,
        Scope $scope
    ): array {
        if (!$node instanceof Node\Stmt\Function_) {
            throw new ShouldNotHappenException(\sprintf(
                'Expected node to be instance of "%s", but got instance of "%s" instead.',
                Node\Stmt\Function_::class,
                \get_class($node)
            ));
        }

        if (!isset($node->namespacedName)) {
            return [];
        }

        if (!$node->getReturnType() instanceof Node\NullableType) {
            return [];
        }

        return [
            \sprintf(
                'Function %s() has a nullable return type declaration.',
                $node->namespacedName->toString()
            ),
        ];
    }
}
