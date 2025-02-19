<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2025 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\FunctionCalls;

use Ergebnis\PHPStan\Rules\ErrorIdentifier;
use PhpParser\Node;
use PHPStan\Analyser;
use PHPStan\Rules;

/**
 * @implements Rules\Rule<Node\Expr\FuncCall>
 */
final class NoNamedArgumentRule implements Rules\Rule
{
    public function getNodeType(): string
    {
        return Node\Expr\FuncCall::class;
    }

    public function processNode(
        Node $node,
        Analyser\Scope $scope
    ): array {
        if (0 === \count($node->args)) {
            return [];
        }

        /** @var list<Node\Arg> $namedArguments */
        $namedArguments = \array_values(\array_filter($node->args, static function ($argument): bool {
            if (!$argument instanceof Node\Arg) {
                return false;
            }

            return $argument->name instanceof Node\Identifier;
        }));

        if (0 === \count($namedArguments)) {
            return [];
        }

        $functionName = $node->name;

        return \array_map(static function (Node\Arg $namedArgument) use ($functionName): Rules\RuleError {
            /** @var Node\Identifier $argumentName */
            $argumentName = $namedArgument->name;

            $message = \sprintf(
                'Function %s() is invoked with named argument for parameter $%s.',
                $functionName,
                $argumentName->toString(),
            );

            return Rules\RuleErrorBuilder::message($message)
                ->identifier(ErrorIdentifier::noNamedArgument()->toString())
                ->build();
        }, $namedArguments);
    }
}
