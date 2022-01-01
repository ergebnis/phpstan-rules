<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2022 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\AutoReview;

use Ergebnis\Test\Util\Helper;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @coversNothing
 */
final class SrcCodeTest extends Framework\TestCase
{
    use Helper;

    public function testSrcClassesHaveIntegrationTests(): void
    {
        self::assertClassesHaveTests(
            __DIR__ . '/../../src',
            'Ergebnis\\PHPStan\\Rules\\',
            'Ergebnis\\PHPStan\\Rules\\Test\\Integration\\'
        );
    }
}
