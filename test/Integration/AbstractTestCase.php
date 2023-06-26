<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2023 Andreas Möller
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

    abstract public static function provideCasesWhereAnalysisShouldSucceed(): iterable;

    abstract public static function provideCasesWhereAnalysisShouldFail(): iterable;
}
