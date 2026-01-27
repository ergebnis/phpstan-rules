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

namespace Ergebnis\PHPStan\Rules\Test\Integration\Files;

use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Files\NoPhpstanIgnoreRule
 *
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<\Ergebnis\PHPStan\Rules\Files\NoPhpstanIgnoreRule>
 */
final class NoPhpStanIgnoreRuleTest extends Testing\RuleTestCase
{
    use Test\Util\Helper;

    public function testNoIgnoreRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Files/NoPhpstanIgnoreRule'),
            [
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore", fix the error or use the baseline instead.',
                    5,
                ],
                [
                    'No error with identifier variable.undefined is reported on line 6.',
                    6,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore", fix the error or use the baseline instead.',
                    8,
                ],
                [
                    'No error with identifier variable.undefined is reported on line 9.',
                    9,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore", fix the error or use the baseline instead.',
                    11,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore", fix the error or use the baseline instead.',
                    11,
                ],
                [
                    'No error with identifier variable.undefined is reported on line 12.',
                    12,
                ],
                [
                    'No error with identifier variable.undefined is reported on line 12.',
                    12,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore", fix the error or use the baseline instead.',
                    14,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore", fix the error or use the baseline instead.',
                    15,
                ],
                [
                    'No error with identifier variable.undefined is reported on line 15.',
                    15,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore", fix the error or use the baseline instead.',
                    17,
                ],
                [
                    'No error with identifier variable.undefined is reported on line 17.',
                    17,
                ],
                [
                    'No error with identifier variable.undefined is reported on line 18.',
                    18,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore-line", fix the error or use the baseline instead.',
                    19,
                ],
                [
                    'No error to ignore is reported on line 19.',
                    19,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore-line", fix the error or use the baseline instead.',
                    20,
                ],
                [
                    'No error to ignore is reported on line 20.',
                    20,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore-line", fix the error or use the baseline instead.',
                    21,
                ],
                [
                    'No error to ignore is reported on line 21.',
                    21,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore-line", fix the error or use the baseline instead.',
                    22,
                ],
                [
                    'No error to ignore is reported on line 22.',
                    22,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore-next-line", fix the error or use the baseline instead.',
                    24,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore-line", fix the error or use the baseline instead.',
                    25,
                ],
                [
                    'No error to ignore is reported on line 25.',
                    25,
                ],
                [
                    'No error to ignore is reported on line 25.',
                    25,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore-next-line", fix the error or use the baseline instead.',
                    27,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore-next-line", fix the error or use the baseline instead.',
                    27,
                ],
                [
                    'No error to ignore is reported on line 28.',
                    28,
                ],
                [
                    'No error to ignore is reported on line 28.',
                    28,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore-next-line", fix the error or use the baseline instead.',
                    30,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore-next-line", fix the error or use the baseline instead.',
                    30,
                ],
                [
                    'No error to ignore is reported on line 31.',
                    31,
                ],
                [
                    'No error to ignore is reported on line 31.',
                    31,
                ],
                [
                    'Errors reported by phpstan/phpstan should not be ignored via "@phpstan-ignore-next-line", fix the error or use the baseline instead.',
                    33,
                ],
                [
                    'No error to ignore is reported on line 34.',
                    34,
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new \Ergebnis\PHPStan\Rules\Files\NoPhpstanIgnoreRule();
    }
}
