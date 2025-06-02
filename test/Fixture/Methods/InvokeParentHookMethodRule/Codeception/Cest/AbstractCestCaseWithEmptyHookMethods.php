<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Cest;

abstract class AbstractCestCaseWithEmptyHookMethods
{
    public function _before(): void
    {
    }

    public function _after(): void
    {
    }
}
