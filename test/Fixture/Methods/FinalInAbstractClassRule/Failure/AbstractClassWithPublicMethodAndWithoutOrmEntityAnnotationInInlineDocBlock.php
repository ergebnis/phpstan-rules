<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule\Failure;

/** @OrM\eNtItY */
abstract class AbstractClassWithPublicMethodAndWithoutOrmEntityAnnotationInInlineDocBlock
{
    public function method(): void
    {
    }
}
