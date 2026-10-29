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

use Ergebnis\PHPStan\Rules\Files;
use Ergebnis\PHPStan\Rules\Test;
use PHPStan\Rules;
use PHPStan\Testing;

/**
 * @covers \Ergebnis\PHPStan\Rules\Files\DeclareStrictTypesRule
 *
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSample
 * @uses \Ergebnis\PHPStan\Rules\Documentation\CodeSampleList
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ConfigurationKey
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Description
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ErrorTip
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Parameter
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterExample
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterList
 * @uses \Ergebnis\PHPStan\Rules\Documentation\ParameterName
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Rationale
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Reference
 * @uses \Ergebnis\PHPStan\Rules\Documentation\RuleDefinition
 * @uses \Ergebnis\PHPStan\Rules\Documentation\Tip
 * @uses \Ergebnis\PHPStan\Rules\ErrorIdentifier
 *
 * @extends Testing\RuleTestCase<Files\DeclareStrictTypesRule>
 */
final class DeclareStrictTypesRuleTest extends Testing\RuleTestCase
{
    use Test\Util\ErrorTip;
    use Test\Util\Helper;

    public function testDeclareStrictTypesRule(): void
    {
        $this->analyse(
            self::phpFilesIn(__DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule'),
            [
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    5,
                    $this->errorTip(),
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    5,
                    $this->errorTip(),
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    5,
                    $this->errorTip(),
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                    $this->errorTip(),
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                    $this->errorTip(),
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                    $this->errorTip(),
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                    $this->errorTip(),
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    7,
                    $this->errorTip(),
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    7,
                    $this->errorTip(),
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    7,
                    $this->errorTip(),
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    1,
                    $this->errorTip(),
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    1,
                    $this->errorTip(),
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    1,
                    $this->errorTip(),
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                    $this->errorTip(),
                ],
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                    $this->errorTip(),
                ],
            ],
        );
    }

    protected function getRule(): Rules\Rule
    {
        return new Files\DeclareStrictTypesRule();
    }
}
