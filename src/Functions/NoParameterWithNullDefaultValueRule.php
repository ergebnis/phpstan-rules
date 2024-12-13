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

namespace Ergebnis\PHPStan\Rules\Functions;

use Ergebnis\PHPStan\Rules\ErrorIdentifier;
use PhpParser\Node;
use PHPStan\Analyser;
use PHPStan\Rules;

/**
 * @implements Rules\Rule<Node\Stmt\Function_>
 */
final class NoParameterWithNullDefaultValueRule implements Rules\Rule
{
    public function getNodeType(): string
    {
        return Node\Stmt\Function_::class;
    }

    public function processNode(
        Node $node,
        Analyser\Scope $scope
    ): array {
        if (0 === \count($node->params)) {
            return [];
        }

        $parametersWithNullDefaultValue = \array_values(\array_filter($node->params, static function (Node\Param $node): bool {
            return self::hasNullDefaultValue($node);
        }));

        if (0 === \count($parametersWithNullDefaultValue)) {
            return [];
        }

        $functionName = $node->namespacedName;

        return \array_map(static function (Node\Param $parameterWithNullDefaultValue) use ($functionName): Rules\RuleError {
            /** @var Node\Expr\Variable $variable */
            $variable = $parameterWithNullDefaultValue->var;

            /** @var string $parameterName */
            $parameterName = $variable->name;

            $message = \sprintf(
                'Function %s() has parameter $%s with null as default value.',
                $functionName,
                $parameterName,
            );

            return Rules\RuleErrorBuilder::message($message)
                ->identifier(ErrorIdentifier::noParameterWithNullDefaultValue()->toString())
                ->build();
        }, $parametersWithNullDefaultValue);
    }

    private static function hasNullDefaultValue(Node\Param $parameter): bool
    {
        if (!$parameter->default instanceof Node\Expr\ConstFetch) {
            return false;
        }

        return 'null' === $parameter->default->name->toLowerString();
    }
}
