<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Expressions\NoEvalRule\Success;

function _eval(string $argument): void
{
}

_eval('echo $foo');
