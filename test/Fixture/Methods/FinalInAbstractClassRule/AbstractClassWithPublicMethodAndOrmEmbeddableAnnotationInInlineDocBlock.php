<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule;

/** @ORM\Embeddable */
abstract class AbstractClassWithPublicMethodAndOrmEmbeddableAnnotationInInlineDocBlock
{
    public function method(): void
    {
    }
}