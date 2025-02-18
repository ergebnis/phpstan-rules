<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Expressions\NoAssignByReferenceRule;

$foo = 'bar';

$bar = $foo;

$baz = &$foo;
