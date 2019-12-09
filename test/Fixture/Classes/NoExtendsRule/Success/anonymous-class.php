<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\NoExtendsRule\Success;

$foo = new class() {
    public function __toString(): string
    {
        return 'Hmm';
    }
};
