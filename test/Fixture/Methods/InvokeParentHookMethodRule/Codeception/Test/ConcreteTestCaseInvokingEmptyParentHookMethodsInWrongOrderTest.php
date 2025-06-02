<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test;

use Codeception\Test;

class ConcreteTestCaseInvokingEmptyParentHookMethodsInWrongOrderTest extends Test\Unit
{
    protected function _before(): void
    {
        self::setUpSomethingElse();

        parent::_before();
    }

    protected function _after(): void
    {
        parent::_after();

        self::tearDownSomethingElse();
    }

    private static function setUpSomethingElse(): void
    {
    }

    private static function tearDownSomethingElse(): void
    {
    }
}
