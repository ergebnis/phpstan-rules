<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule;

/** @ORM\Mapping\Embeddable */
abstract class AbstractClassWithProtectedMethodAndOrmMappingEmbeddableAnnotationInInlineDocBlock
{
    protected function method(): void
    {
    }
}
