<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule\Success;

/**
 * @ORM\Embeddable
 */
abstract class AbstractClassWithPublicMethodAndOrmEmbeddableAnnotationInMultilineDocBlock
{
    public function method(): void
    {
    }
}
