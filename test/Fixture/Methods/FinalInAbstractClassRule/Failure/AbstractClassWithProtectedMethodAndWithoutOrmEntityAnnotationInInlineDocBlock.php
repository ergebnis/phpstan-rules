<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule\Failure;

/** @OrM\eNtItY */
abstract class AbstractClassWithProtectedMethodAndWithoutOrmEntityAnnotationInInlineDocBlock
{
    protected function method(): void
    {
    }
}
