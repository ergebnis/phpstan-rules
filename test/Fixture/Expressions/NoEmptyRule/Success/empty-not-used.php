<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Expressions\NoEmptyRule\Success;

function _empty(): bool
{
    return false;
}

if (_empty()) {
    echo 'Hello!';
}
