<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Cest;

class ConcreteCestCaseInvokingNonEmptyParentHookMethodsInWrongOrderCestHook extends AbstractCestCaseWithNonEmptyHookMethods
{
    public function _before(): void
    {
        self::setUpSomethingElse();

        parent::_before();
    }

    public function _after(): void
    {
        parent::_after();

        self::tearDownSomethingElse();
    }

    private static function setUpSomethingElse(): void
    {
    }

    private static function tearDownSomethingElse(): void
    {
    }
}
