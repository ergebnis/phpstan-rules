<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Cest;

class ConcreteCestCaseNotInvokingNonEmptyParentHookMethodsCestHook extends AbstractCestCaseWithNonEmptyHookMethods
{
    public function _before(): void
    {
        self::setUpSomethingElse();
    }

    public function _after(): void
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
