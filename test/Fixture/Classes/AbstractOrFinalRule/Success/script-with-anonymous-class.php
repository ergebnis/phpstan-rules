<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Classes\AbstractOrFinalRule\Success;

$foo = new class() {
    public function __toString(): string
    {
        return 'Hmm';
    }
};
