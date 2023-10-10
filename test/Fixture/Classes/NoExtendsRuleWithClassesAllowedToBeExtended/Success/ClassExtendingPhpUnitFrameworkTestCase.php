<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\NoExtendsRuleWithClassesAllowedToBeExtended\Success;

use PHPUnit\Framework;

#[Framework\Attributes\CoversNothing()]
final class ClassExtendingPhpUnitFrameworkTestCase extends Framework\TestCase
{
}
