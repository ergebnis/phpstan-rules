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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Files;

use Ergebnis\PHPStan\Rules\Files;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Files\DeclareStrictTypesRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Files\DeclareStrictTypesRule>
 */
final class DeclareStrictTypesRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testDeclareStrictTypesRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule'),
            [
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    5,
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    5,
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    5,
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    7,
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    7,
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    7,
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    1,
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    1,
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    1,
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Files\DeclareStrictTypesRule();
    }
}
