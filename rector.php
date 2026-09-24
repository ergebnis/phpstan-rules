<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2026 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

use Ergebnis\Rector;
use Rector\Config;
use Rector\PHPUnit;
use Rector\ValueObject;

return static function (Config\RectorConfig $rectorConfig): void {
    $rectorConfig->cacheDirectory(__DIR__ . '/.build/rector/');

    $rectorConfig->paths([
        __DIR__ . '/src/',
        __DIR__ . '/test/',
        __DIR__ . '/.php-cs-fixer.php',
        __DIR__ . '/rector.php',
    ]);

    $rectorConfig->phpVersion(ValueObject\PhpVersion::PHP_74);

    $rectorConfig->rules([
        Rector\Rules\Faker\GeneratorPropertyFetchToMethodCallRector::class,
    ]);

    $rectorConfig->sets([
        PHPUnit\Set\PHPUnitSetList::COMPOSER_BASED,
    ]);

    $rectorConfig->skip([
        __DIR__ . '/test/Fixture/',
    ]);
};
