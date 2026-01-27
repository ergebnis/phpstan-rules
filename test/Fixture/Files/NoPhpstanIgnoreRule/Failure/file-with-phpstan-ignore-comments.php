<?php

declare(strict_types=1);

// @phpstan-ignore variable.undefined
echo $undefined;

/* @phpstan-ignore variable.undefined */
echo $undefined;

/** @phpstan-ignore variable.undefined */
echo $undefined;

/*
 * @phpstan-ignore variable.undefined
 */
echo $undefined;

echo $undefined; // @phpstan-ignore-line

echo $undefined; /* @phpstan-ignore-line */

echo $undefined;

/** @phpstan-ignore-line */

// @phpstan-ignore-next-line
echo $undefined;

/* @phpstan-ignore-next-line */
echo $undefined;

/** @phpstan-ignore-next-line */
echo $undefined;
