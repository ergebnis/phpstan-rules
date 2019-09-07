<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Expressions\NoSwitchRule\Failure;

switch ($foo) {
    case 'foo':
        return 'It is foo!';
    case 'bar':
        return 'It is bar!';
}
