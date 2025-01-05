<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2025 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Util;

use Symfony\Component\Finder;

trait Helper
{
    /**
     * @return list<string>
     */
    private static function phpFilesIn(string $directory): array
    {
        $finder = Finder\Finder::create()
            ->files()
            ->in($directory)
            ->name('/\.php$/')
            ->sortByName();

        return \array_map(static function (Finder\SplFileInfo $fileInfo): string {
            return $fileInfo->getPathname();
        }, \iterator_to_array($finder, false));
    }
}
