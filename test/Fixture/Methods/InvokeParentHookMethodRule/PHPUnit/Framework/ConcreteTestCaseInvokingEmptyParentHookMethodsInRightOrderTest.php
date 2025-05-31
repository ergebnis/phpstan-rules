<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework;

use PHPUnit\Framework;

class ConcreteTestCaseInvokingEmptyParentHookMethodsInRightOrderTest extends Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        self::setUpSomethingElse();
    }

    public static function tearDownAfterClass(): void
    {
        self::tearDownSomethingElse();

        parent::tearDownAfterClass();
    }

    protected function setUp(): void
    {
        parent::setUp();

        self::setUpSomethingElse();
    }

    protected function assertPreConditions(): void
    {
        parent::assertPreConditions();

        self::assertSomethingElse();
    }

    protected function assertPostConditions(): void
    {
        self::assertSomethingElse();

        parent::assertPostConditions();
    }

    protected function tearDown(): void
    {
        self::tearDownSomethingElse();

        parent::tearDown();
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
