<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule\Success;

/**
 * @Embeddable
 */
abstract class AbstractClassWithPublicMethodAndEmbeddableAnnotationInMultilineDocBlock
{
    public function method(): void
    {
    }
}
