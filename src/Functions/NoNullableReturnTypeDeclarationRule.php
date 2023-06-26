<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2023 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Functions;

use PhpParser\Node;
use PHPStan\Analyser;
use PHPStan\Rules;
use PHPStan\ShouldNotHappenException;

final class NoNullableReturnTypeDeclarationRule implements Rules\Rule
{
    public function getNodeType(): string
    {
        return Node\Stmt\Function_::class;
    }

    public function processNode(
        Node $node,
        Analyser\Scope $scope,
    ): array {
        if (!$node instanceof Node\Stmt\Function_) {
            throw new ShouldNotHappenException(\sprintf(
                'Expected node to be instance of "%s", but got instance of "%s" instead.',
                Node\Stmt\Function_::class,
                $node::class,
            ));
        }

        if (!isset($node->namespacedName)) {
            return [];
        }

        if (!self::hasNullableReturnType($node)) {
            return [];
        }

        return [
            \sprintf(
                'Function %s() has a nullable return type declaration.',
                $node->namespacedName->toString(),
            ),
        ];
    }

    private static function hasNullableReturnType(Node\Stmt\Function_ $node): bool
    {
        $returnType = $node->getReturnType();

        if ($returnType instanceof Node\NullableType) {
            return true;
        }

        if ($returnType instanceof Node\UnionType) {
            foreach ($returnType->types as $type) {
                if (!$type instanceof Node\Identifier) {
                    continue;
                }

                if ('null' === $type->toString()) {
                    return true;
                }
            }
        }

        return false;
    }
}
