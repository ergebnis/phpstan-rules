<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework;

class ConcreteTestCaseInvokingNonEmptyParentHookMethodsInFinallyInRightOrderTest extends AbstractTestCaseWithNonEmptyHookMethods
{
    public static function tearDownAfterClass(): void
    {
        try {
            self::tearDownSomethingElse();
        } finally {
            parent::tearDownAfterClass();
        }
    }

    protected function assertPostConditions(): void
    {
        self::assertSomethingElse();

        try {
            self::assertSomethingElse();
        } catch (\Exception $exception) {
            self::assertSomethingElse();
        } finally {
            self::assertSomethingElse();

            parent::assertPostConditions();
        }
    }

    protected function tearDown(): void
    {
        try {
            self::tearDownSomethingElse();
        } finally {
            parent::tearDown();
        }
    }

    private static function tearDownSomethingElse(): void
    {
    }

    private static function assertSomethingElse(): void
    {
    }
}
