<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule\Failure;

/**
 * @eNtItY
 */
abstract class AbstractClassWithPublicMethodAndWithoutEntityAnnotationInMultilineDocBlock
{
    public function method(): void
    {
    }
}
