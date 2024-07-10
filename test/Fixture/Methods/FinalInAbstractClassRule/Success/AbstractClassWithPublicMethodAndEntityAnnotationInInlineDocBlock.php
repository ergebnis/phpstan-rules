<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule\Success;

/** @Entity */
abstract class AbstractClassWithPublicMethodAndEntityAnnotationInInlineDocBlock
{
    public function method(): void
    {
    }
}
