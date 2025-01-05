<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Expressions\NoEvalRule;

function _eval(string $argument): void
{
}

_eval('echo $foo');

eval('echo $foo');

eVaL('echo $foo');
