<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule;

/**
 * @ORM\Mapping\Embeddable
 */
abstract class AbstractClassWithProtectedMethodAndOrmMappingEmbeddableAnnotationInMultilineDocBlock
{
    protected function method(): void
    {
    }
}
