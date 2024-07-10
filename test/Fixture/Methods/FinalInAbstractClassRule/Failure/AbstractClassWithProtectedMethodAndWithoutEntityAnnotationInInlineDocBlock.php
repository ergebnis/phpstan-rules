<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule\Failure;

/** @eNtItY */
abstract class AbstractClassWithProtectedMethodAndWithoutEntityAnnotationInInlineDocBlock
{
    protected function method(): void
    {
    }
}
