<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Constants\NoAccessToConstantViaInstanceRule;

interface InterfaceWithConstant
{
    public const QUX = 'qux';
}
