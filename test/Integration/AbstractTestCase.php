<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2024 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration;

use PHPStan\Testing\RuleTestCase;
use PHPUnit\Framework;

abstract class AbstractTestCase extends RuleTestCase
{
    #[Framework\Attributes\DataProvider('provideCasesWhereAnalysisShouldSucceed')]
    final public function testAnalysisSucceeds(string $path): void
    {
        self::assertFileExists($path);

        $this->analyse(
            [
                $path,
            ],
            [],
        );
    }

    /**
     * @param array{0: string, 1: int} $error
     */
    #[Framework\Attributes\DataProvider('provideCasesWhereAnalysisShouldFail')]
    final public function testAnalysisFails(string $path, array $error): void
    {
        self::assertFileExists($path);

        $this->analyse(
            [
                $path,
            ],
            [
                $error,
            ],
        );
    }

    /**
     * @return iterable<string, array{0: string}>
     */
    abstract public static function provideCasesWhereAnalysisShouldSucceed(): iterable;

    /**
     * @return iterable<string, array{0: string, 1: array{0: string, 1: int}}>
     */
    abstract public static function provideCasesWhereAnalysisShouldFail(): iterable;
}
