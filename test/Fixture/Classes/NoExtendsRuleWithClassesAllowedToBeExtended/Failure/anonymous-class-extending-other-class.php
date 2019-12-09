<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\NoExtendsRuleWithClassesAllowedToBeExtended\Failure;

$foo = new class() extends OtherClass {
    public function __toString(): string
    {
        return 'Hmm';
    }
};
