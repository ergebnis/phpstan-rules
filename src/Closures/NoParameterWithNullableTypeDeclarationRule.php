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

/**
 * @implements Rules\Rule<Node\Expr\Closure>
 */
final class NoParameterWithNullableTypeDeclarationRule implements Rules\Rule
{
    public function getNodeType(): string
    {
        return Node\Expr\Closure::class;
    }

    public function processNode(
        Node $node,
        Analyser\Scope $scope
    ): array {
        if (0 === \count($node->params)) {
            return [];
        }

        $parametersWithNullableTypeDeclaration = \array_values(\array_filter($node->params, static function (Node\Param $parameter): bool {
            return self::hasNullableTypeDeclaration($parameter);
        }));

        if (0 === \count($parametersWithNullableTypeDeclaration)) {
            return [];
        }

        return \array_map(static function (Node\Param $parameterWithNullableTypeDeclaration): Rules\RuleError {
            /** @var Node\Expr\Variable $variable */
            $variable = $parameterWithNullableTypeDeclaration->var;

            /** @var string $parameterName */
            $parameterName = $variable->name;

            $message = \sprintf(
                'Closure has parameter $%s with a nullable type declaration.',
                $parameterName,
            );

            return Rules\RuleErrorBuilder::message($message)
                ->identifier(ErrorIdentifier::noParameterWithNullableTypeDeclaration()->toString())
                ->build();
        }, $parametersWithNullableTypeDeclaration);
    }

    private static function hasNullableTypeDeclaration(Node\Param $parameter): bool
    {
        if ($parameter->type instanceof Node\NullableType) {
            return true;
        }

        if ($parameter->type instanceof Node\UnionType) {
            foreach ($parameter->type->types as $type) {
                if (!$type instanceof Node\Identifier) {
                    continue;
                }

                if ('null' !== $type->toString()) {
                    continue;
                }

                return true;
            }
        }

        return false;
    }
}
