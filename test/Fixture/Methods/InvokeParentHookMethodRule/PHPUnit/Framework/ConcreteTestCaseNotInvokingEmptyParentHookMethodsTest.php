<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\PHPUnit\Framework;

use PHPUnit\Framework;

class ConcreteTestCaseNotInvokingEmptyParentHookMethodsTest extends Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
    }

    public static function tearDownAfterClass(): void
    {
    }

    protected function setUp(): void
    {
    }

    protected function assertPreConditions(): void
    {
    }

    protected function assertPostConditions(): void
    {
    }

    protected function tearDown(): void
    {
    }
}
