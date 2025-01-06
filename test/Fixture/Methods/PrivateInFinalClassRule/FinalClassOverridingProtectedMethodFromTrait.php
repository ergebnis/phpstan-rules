<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\PrivateInFinalClassRule;

final class FinalClassOverridingProtectedMethodFromTrait
{
    use TraitWithProtectedMethod;

    protected function method(): void
    {
    }
}
