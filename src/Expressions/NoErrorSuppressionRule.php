<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2020 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Expressions;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;

final class NoErrorSuppressionRule implements Rule
{
    public function getNodeType(): string
    {
        return Node\Expr\ErrorSuppress::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        return [
            'Error suppression via "@" should not be used.',
        ];
    }
}
