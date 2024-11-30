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

namespace Ergebnis\PHPStan\Rules\Methods;

use PhpParser\Node;
use PHPStan\Analyser;
use PHPStan\Reflection;
use PHPStan\Rules;
use PHPStan\ShouldNotHappenException;

/**
 * @implements Rules\Rule<Node\Stmt\ClassMethod>
 */
final class NoNullableReturnTypeDeclarationRule implements Rules\Rule
{
    public function getNodeType(): string
    {
        return Node\Stmt\ClassMethod::class;
    }

    public function processNode(
        Node $node,
        Analyser\Scope $scope,
    ): array {
        if (!$node instanceof Node\Stmt\ClassMethod) {
            throw new ShouldNotHappenException(\sprintf(
                'Expected node to be instance of "%s", but got instance of "%s" instead.',
                Node\Stmt\ClassMethod::class,
                $node::class,
            ));
        }

        if (!self::hasNullableReturnType($node)) {
            return [];
        }

        /** @var Reflection\ClassReflection $classReflection */
        $classReflection = $scope->getClassReflection();

        if ($classReflection->isAnonymous()) {
            $ruleErrorBuilder = Rules\RuleErrorBuilder::message(\sprintf(
                'Method %s() in anonymous class has a nullable return type declaration.',
                $node->name->name,
            ));

            return [
                $ruleErrorBuilder->build(),
            ];
        }

        $ruleErrorBuilder = Rules\RuleErrorBuilder::message(\sprintf(
            'Method %s::%s() has a nullable return type declaration.',
            $classReflection->getName(),
            $node->name->name,
        ));

        return [
            $ruleErrorBuilder->build(),
        ];
    }

    private static function hasNullableReturnType(Node\Stmt\ClassMethod $node): bool
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
