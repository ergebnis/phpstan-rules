<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test;

class ConcreteTestCaseNotInvokingNonEmptyParentHookMethodsTest extends AbstractTestCaseWithNonEmptyHookMethods
{
    protected function setUp(): void
    {
        self::setUpSomethingElse();
    }

    protected function tearDown(): void
    {
        self::tearDownSomethingElse();
    }

    protected function _setUp(): void
    {
        parent::_setUp();
    }

    protected function _tearDown(): void
    {
        self::tearDownSomethingElse();
    }

    protected function _before(): void
    {
        parent::_before();
    }

    protected function _after(): void
    {
        self::tearDownSomethingElse();
    }

    private static function setUpSomethingElse(): void
    {
    }

    private static function tearDownSomethingElse(): void
    {
    }
}
