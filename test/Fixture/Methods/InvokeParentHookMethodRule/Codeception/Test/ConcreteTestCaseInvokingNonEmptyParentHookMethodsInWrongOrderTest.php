<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test;

class ConcreteTestCaseInvokingNonEmptyParentHookMethodsInWrongOrderTest extends AbstractTestCaseWithNonEmptyHookMethods
{
    protected function setUp(): void
    {
        self::setUpSomethingElse();

        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        self::tearDownSomethingElse();
    }

    protected function _setUp(): void
    {
        self::setUpSomethingElse();

        parent::_setUp();
    }

    protected function _tearDown(): void
    {
        parent::_tearDown();

        self::tearDownSomethingElse();
    }

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
