<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule;

use PHPUnit\Framework;

final class FinalClassWithProtectedMethodsWithPhpUnitAnnotations extends Framework\TestCase
{
    /**
     * @after
     */
    protected function methodWithAfterAnnotation(): void
    {
    }

    /**
     * @before
     */
    protected function methodWithBeforeAnnotation(): void
    {
    }

    /**
     * @preCondition
     */
    protected function methodWithPreConditionAnnotation(): void
    {
    }

    /**
     * @postCondition
     */
    protected function methodWithPostConditionAnnotation(): void
    {
    }
}
