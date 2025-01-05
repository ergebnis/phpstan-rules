<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule;

/**
 * @Entity
 */
abstract class AbstractClassWithPublicMethodAndEntityAnnotationInMultilineDocBlock
{
    public function method(): void
    {
    }
}
