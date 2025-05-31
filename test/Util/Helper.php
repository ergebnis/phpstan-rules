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

use Faker\Factory;
use Faker\Generator;
use Symfony\Component\Finder;

trait Helper
{
    final protected static function faker(string $locale = 'en_US'): Generator
    {
        /**
         * @var array<string, Generator> $fakers
         */
        static $fakers = [];

        if (!\array_key_exists($locale, $fakers)) {
            $faker = Factory::create($locale);

            $faker->seed(9001);

            $fakers[$locale] = $faker;
        }

        return $fakers[$locale];
    }

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
