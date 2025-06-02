<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework;

use PHPUnit\Framework;

abstract class AbstractTestCaseWithNonEmptyHookMethods extends Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        self::setUpSomething();
    }

    public static function tearDownAfterClass(): void
    {
        self::tearDownSomething();
    }

    protected function setUp(): void
    {
        self::setUpSomething();
    }

    protected function assertPreConditions(): void
    {
        self::assertSomething();
    }

    protected function assertPostConditions(): void
    {
        self::assertSomething();
    }

    protected function tearDown(): void
    {
        self::tearDownSomething();
    }

    private static function setUpSomething(): void
    {
    }

    private static function tearDownSomething(): void
    {
    }

    private static function assertSomething(): void
    {
    }
}
