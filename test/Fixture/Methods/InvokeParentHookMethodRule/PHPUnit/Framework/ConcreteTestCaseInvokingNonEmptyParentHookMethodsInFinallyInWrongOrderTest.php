<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework;

class ConcreteTestCaseInvokingNonEmptyParentHookMethodsInFinallyInWrongOrderTest extends AbstractTestCaseWithNonEmptyHookMethods
{
    public static function tearDownAfterClass(): void
    {
        try {
            self::tearDownSomethingElse();
        } finally {
            parent::tearDownAfterClass();
        }

        self::tearDownSomethingElse();
    }

    protected function assertPostConditions(): void
    {
        try {
            self::assertSomethingElse();
        } catch (\Exception $exception) {
            parent::assertPostConditions();
        }
    }

    protected function tearDown(): void
    {
        try {
            self::tearDownSomethingElse();
        } finally {
            parent::tearDown();

            self::tearDownSomethingElse();
        }
    }

    private static function tearDownSomethingElse(): void
    {
    }

    private static function assertSomethingElse(): void
    {
    }
}
