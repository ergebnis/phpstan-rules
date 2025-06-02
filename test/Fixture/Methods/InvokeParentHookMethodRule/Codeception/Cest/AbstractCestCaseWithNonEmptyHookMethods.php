<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Cest;

abstract class AbstractCestCaseWithNonEmptyHookMethods
{
    public function _before(): void
    {
        self::setUpSomething();
    }

    public function _after(): void
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
