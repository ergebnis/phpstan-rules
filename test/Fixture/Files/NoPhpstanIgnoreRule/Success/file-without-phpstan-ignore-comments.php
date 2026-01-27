<?php

declare(strict_types=1);

// a normal comment
/* a normal block comment */

/** a normal doc comment */
echo 'Hello!';

// @phpstan-type Foo = int
/* @phpstan-param int $x */

/** @phpstan-return int */
echo 'World!';
