<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Expressions\NoSwitchRule\Success;

if ('foo' === $foo) {
    return 'It is foo!';
}

if ('bar' === $foo) {
    return 'It is bar!';
}
