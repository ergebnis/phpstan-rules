<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule;

final class FinalClassImplementingAbstractProtectedMethodFromTrait
{
    use TraitWithAbstractProtectedMethod;

    protected function method(): void
    {
    }
}
