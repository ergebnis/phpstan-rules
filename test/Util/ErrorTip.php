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

namespace Ergebnis\PHPStan\Rules\Test\Util;

use Ergebnis\PHPStan\Rules\Documentation;
use PHPStan\Rules;

trait ErrorTip
{
    abstract protected function getRule(): Rules\Rule;

    private function errorTip(): string
    {
        $rule = $this->getRule();

        if (!$rule instanceof Documentation\HasRuleDefinition) {
            throw new \RuntimeException(\sprintf(
                'Rule "%s" does not implement "%s".',
                \get_class($rule),
                Documentation\HasRuleDefinition::class,
            ));
        }

        return Documentation\ErrorTip::for($rule);
    }
}
