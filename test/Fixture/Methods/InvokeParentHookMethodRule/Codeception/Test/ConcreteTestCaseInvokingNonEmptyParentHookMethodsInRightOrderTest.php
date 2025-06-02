<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test;

class ConcreteTestCaseInvokingNonEmptyParentHookMethodsInRightOrderTest extends AbstractTestCaseWithNonEmptyHookMethods
{
    protected function setUp(): void
    {
        parent::setUp();

        self::setUpSomethingElse();
    }

    protected function tearDown(): void
    {
        self::tearDownSomethingElse();

        parent::tearDown();
    }

    protected function _setUp(): void
    {
        parent::_setUp();

        self::setUpSomethingElse();
    }

    protected function _tearDown(): void
    {
        self::tearDownSomethingElse();

        parent::_tearDown();
    }

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
