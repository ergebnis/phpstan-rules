<?php

declare(strict_types=1);

/**
 * @see https://github.com/ergebnis/phpstan-rules/issues/953
 */

namespace Ergebnis\PHPStan\Rules\Test\Fixture\CallLikes\NoNamedArgumentRule;

use Carbon\CarbonImmutable;

class Foo
{
    public function __construct(
    ) {
        CarbonImmutable::createFromTimestampUTC(123)->floatDiffInMonths(
            date: new \DateTimeImmutable(),
            absolute: false,
        );
    }
}
