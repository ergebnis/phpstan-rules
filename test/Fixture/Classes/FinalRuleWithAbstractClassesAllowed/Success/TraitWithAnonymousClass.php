<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Classes\FinalRuleWithAbstractClassesAllowed\Success;

trait TraitWithAnonymousClass
{
    public function create()
    {
        return new class() {
            public function __toString(): string
            {
                return 'Hmm';
            }
        };
    }
}
