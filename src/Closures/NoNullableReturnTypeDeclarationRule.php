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

namespace Ergebnis\PHPStan\Rules\Closures;

use Ergebnis\PHPStan\Rules\ErrorIdentifier;
use PhpParser\Node;
use PHPStan\Analyser;
use PHPStan\Rules;
use PHPStan\ShouldNotHappenException;

/**
 * @implements Rules\Rule<Node\Expr\Closure>
 */
final class NoNullableReturnTypeDeclarationRule implements Rules\Rule
{
    public function getNodeType(): string
    {
        return Node\Expr\Closure::class;
    }

    public function processNode(
        Node $node,
        Analyser\Scope $scope,
    ): array {
        if (!$node instanceof Node\Expr\Closure) {
            throw new ShouldNotHappenException(\sprintf(
                'Expected node to be instance of "%s", but got instance of "%s" instead.',
                Node\Expr\Closure::class,
                $node::class,
            ));
        }

        if (!self::hasNullableReturnType($node)) {
            return [];
        }

        $ruleErrorBuilder = Rules\RuleErrorBuilder::message('Closure has a nullable return type declaration.');

        return [
            $ruleErrorBuilder->identifier(ErrorIdentifier::noNullableReturnTypeDeclaration()->toString())->build(),
        ];
    }

    private static function hasNullableReturnType(Node\Expr\Closure $node): bool
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
