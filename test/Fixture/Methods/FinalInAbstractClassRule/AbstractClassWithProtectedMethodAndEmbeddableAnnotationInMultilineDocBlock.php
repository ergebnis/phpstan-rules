<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule;

/**
 * @Embeddable
 */
abstract class AbstractClassWithProtectedMethodAndEmbeddableAnnotationInMultilineDocBlock
{
    protected function method(): void
    {
    }
}