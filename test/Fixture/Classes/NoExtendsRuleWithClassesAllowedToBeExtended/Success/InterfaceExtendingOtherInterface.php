<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Classes\NoExtendsRuleWithClassesAllowedToBeExtended\Success;

interface InterfaceExtendingOtherInterface extends OtherInterface
{
}
