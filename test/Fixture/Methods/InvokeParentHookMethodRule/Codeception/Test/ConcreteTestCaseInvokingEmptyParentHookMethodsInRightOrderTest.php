<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test;

use Codeception\Test;

class ConcreteTestCaseInvokingEmptyParentHookMethodsInRightOrderTest extends Test\Unit
{
    protected function _before(): void
    {
        parent::_before();

        self::setUpSomethingElse();
    }

    protected function _after(): void
    {
        self::tearDownSomethingElse();

        parent::_after();
    }

    private static function setUpSomethingElse(): void
    {
    }

    private static function tearDownSomethingElse(): void
    {
    }
}
