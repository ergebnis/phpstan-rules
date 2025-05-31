<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\InvokeParentHookMethodRule\Codeception\Test;

use Codeception\Test;

class ConcreteTestCaseNotInvokingEmptyParentHookMethodsTest extends Test\Unit
{
    protected function _before(): void
    {
    }

    protected function _after(): void
    {
    }
}
