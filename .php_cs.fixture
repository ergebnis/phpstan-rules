<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2020 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

use Ergebnis\PhpCsFixer;

$config = PhpCsFixer\Config\Factory::fromRuleSet(new PhpCsFixer\Config\RuleSet\Php71(''), [
    'constant_case' => false,
    'declare_strict_types' => false,
    'error_suppression' => false,
    'final_class' => false,
    'final_internal_class' => false,
    'final_public_method_for_abstract_class' => false,
    'header_comment' => false,
    'lowercase_constants' => false,
    'lowercase_keywords' => false,
    'magic_method_casing' => false,
    'protected_to_private' => false,
    'static_lambda' => false,
]);

$config->getFinder()->in(__DIR__ . '/test/Fixture');

$config->setCacheFile(__DIR__ . '/.build/php-cs-fixer/.php_cs.fixture.cache');

return $config;
