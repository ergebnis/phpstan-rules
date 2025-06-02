<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test;

use Codeception\Test;

abstract class AbstractTestCaseWithNonEmptyHookMethods extends Test\Unit
{
    protected function _before(): void
    {
        self::setUpSomething();
    }

    protected function _after(): void
    {
        self::tearDownSomething();
    }

    private static function setUpSomething(): void
    {
    }

    private static function tearDownSomething(): void
    {
    }
}
