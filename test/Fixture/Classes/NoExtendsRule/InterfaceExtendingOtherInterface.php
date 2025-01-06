<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\NoExtendsRule;

use Ergebnis\PHPStan\Rules\Test\Fixture\Classes\NoExtendsRule\Success\OtherInterface;

interface InterfaceExtendingOtherInterface extends OtherInterface
{
}
