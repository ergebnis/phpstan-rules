<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Expressions\NoEmptyRule\Failure;

if (empty($foo)) {
    echo 'Hello!';
}
