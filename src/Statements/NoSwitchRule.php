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

namespace Ergebnis\PHPStan\Rules\Statements;

use Ergebnis\PHPStan\Rules\ErrorIdentifier;
use PhpParser\Node;
use PHPStan\Analyser;
use PHPStan\Rules;

/**
 * @implements Rules\Rule<Node\Stmt\Switch_>
 */
final class NoSwitchRule implements Rules\Rule
{
    public function getNodeType(): string
    {
        return Node\Stmt\Switch_::class;
    }

    public function processNode(
        Node $node,
        Analyser\Scope $scope,
    ): array {
        $ruleErrorBuilder = Rules\RuleErrorBuilder::message('Control structures using switch should not be used.');

        return [
            $ruleErrorBuilder->identifier(ErrorIdentifier::noSwitch()->toString())->build(),
        ];
    }
}
