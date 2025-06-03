<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework;

class ConcreteTestCaseInvokingNonEmptyParentHookMethodsInRightOrderWithCommentsTest extends AbstractTestCaseWithNonEmptyHookMethods
{
    public static function setUpBeforeClass(): void
    {
        // hmm

        parent::setUpBeforeClass();

        self::setUpSomethingElse();
    }

    public static function tearDownAfterClass(): void
    {
        self::tearDownSomethingElse();

        parent::tearDownAfterClass();

        // hmm
    }

    protected function setUp(): void
    {
        # hmm

        parent::setUp();

        self::setUpSomethingElse();
    }

    protected function assertPreConditions(): void
    {
        # hmm

        parent::assertPreConditions();

        self::assertSomethingElse();
    }

    protected function assertPostConditions(): void
    {
        self::assertSomethingElse();

        parent::assertPostConditions();

        /**
         * hmm
         */
    }

    protected function tearDown(): void
    {
        self::tearDownSomethingElse();

        parent::tearDown();

        /**
         * hmm
         */
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
