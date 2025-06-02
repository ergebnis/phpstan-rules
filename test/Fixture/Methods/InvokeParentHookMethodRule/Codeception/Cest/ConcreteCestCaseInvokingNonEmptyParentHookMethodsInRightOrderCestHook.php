<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Cest;

class ConcreteCestCaseInvokingNonEmptyParentHookMethodsInRightOrderCestHook extends AbstractCestCaseWithNonEmptyHookMethods
{
    public function _before(): void
    {
        parent::_before();

        self::setUpSomethingElse();
    }

    public function _after(): void
    {
        self::tearDownSomethingElse();

        parent::_after();
    }

    private static function setUpSomethingElse(): void
    {
    }

    private static function tearDownSomethingElse(): void
    {
    }
}
