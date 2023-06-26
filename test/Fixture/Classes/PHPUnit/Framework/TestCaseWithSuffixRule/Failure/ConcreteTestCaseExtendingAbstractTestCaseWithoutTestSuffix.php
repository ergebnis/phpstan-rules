<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\PHPUnit\Framework\TestCaseWithSuffixRule\Failure;

#[Framework\Attributes\CoversNothing]
final class ConcreteTestCaseExtendingAbstractTestCaseWithoutTestSuffix extends AbstractTestCase
{
}
