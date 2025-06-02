<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework;

class ConcreteTestCaseInvokingNonEmptyParentHookMethodsInWrongOrderTest extends AbstractTestCaseWithNonEmptyHookMethods
{
    public static function setUpBeforeClass(): void
    {
        self::setUpSomethingElse();

        parent::setUpBeforeClass();
    }

    public static function tearDownAfterClass(): void
    {
        parent::tearDownAfterClass();

        self::tearDownSomethingElse();
    }

    protected function setUp(): void
    {
        self::setUpSomethingElse();

        parent::setUp();
    }

    protected function assertPreConditions(): void
    {
        self::assertSomethingElse();

        parent::assertPreConditions();
    }

    protected function assertPostConditions(): void
    {
        parent::assertPostConditions();

        self::assertSomethingElse();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

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
