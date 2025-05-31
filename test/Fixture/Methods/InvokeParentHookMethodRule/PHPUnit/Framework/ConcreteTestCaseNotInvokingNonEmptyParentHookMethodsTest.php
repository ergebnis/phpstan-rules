<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework;

class ConcreteTestCaseNotInvokingNonEmptyParentHookMethodsTest extends AbstractTestCaseWithNonEmptyHookMethods
{
    public static function setUpBeforeClass(): void
    {
        self::setUpSomethingElse();
    }

    public static function tearDownAfterClass(): void
    {
        self::tearDownSomethingElse();
    }

    protected function setUp(): void
    {
        self::setUpSomethingElse();
    }

    protected function assertPreConditions(): void
    {
        self::assertSomethingElse();
    }

    protected function assertPostConditions(): void
    {
        self::assertSomethingElse();
    }

    protected function tearDown(): void
    {
        self::tearDownSomethingElse();
    }

    private static function setUpSomethingElse(): void
    {
    }

    private static function tearDownSomethingElse(): void
    {
    }

    private static function assertSomethingElse(): void
    {
    }
}
