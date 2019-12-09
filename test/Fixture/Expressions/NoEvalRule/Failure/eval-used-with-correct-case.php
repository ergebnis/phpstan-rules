<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Expressions\NoEvalRule\Failure;

eval('echo $foo');
