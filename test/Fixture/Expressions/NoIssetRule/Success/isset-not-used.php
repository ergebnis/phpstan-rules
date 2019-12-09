<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Expressions\NoIssetRule\Success;

function _isset(): bool
{
    return false;
}

if (_isset()) {
    echo 'Hello!';
}
