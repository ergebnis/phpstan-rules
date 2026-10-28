<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2026 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Closures;

use Ergebnis\PHPStan\Rules\Analyzer;
use Ergebnis\PHPStan\Rules\Documentation;
use Ergebnis\PHPStan\Rules\ErrorIdentifier;
use PhpParser\Node;
use PHPStan\Analyser;
use PHPStan\Rules;

/**
 * @implements Rules\Rule<Node\Expr\Closure>
 */
final class NoNullableReturnTypeDeclarationRule implements
    Documentation\HasRuleDefinition,
    Rules\Rule
{
    private Analyzer $analyzer;

    public function __construct(Analyzer $analyzer)
    {
        $this->analyzer = $analyzer;
    }

    public function ruleDefinition(): Documentation\RuleDefinition
    {
        return Documentation\RuleDefinition::create(
            'noNullableReturnTypeDeclaration',
            'This rule reports an error when a closure uses a nullable return type declaration.',
        );
    }

    public function getNodeType(): string
    {
        return Node\Expr\Closure::class;
    }

    public function processNode(
        Node $node,
        Analyser\Scope $scope
    ): array {
        if (!$this->analyzer->isNullableTypeDeclaration($node->getReturnType())) {
            return [];
        }

        return [
            Rules\RuleErrorBuilder::message('Closure has a nullable return type declaration.')
                ->identifier(ErrorIdentifier::noNullableReturnTypeDeclaration()->toString())
                ->build(),
        ];
    }
}
