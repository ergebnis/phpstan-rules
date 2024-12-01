<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule\Success;

/** @ORM\Mapping\Embeddable */
abstract class AbstractClassWithPublicMethodAndOrmMappingEmbeddableAnnotationInInlineDocBlock
{
    public function method(): void
    {
    }
}
