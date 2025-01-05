<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Expressions\NoIssetRule;

function _isset(): bool
{
    return false;
}

if (_isset()) {
    echo 'Hello!';
}

if (isset($foo)) {
    echo 'Hello!';
}

if (iSsEt($foo)) {
    echo 'Hello!';
}
