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

use Ergebnis\PhpCsFixer;
use PhpCsFixer\Finder;

$ruleSet = PhpCsFixer\Config\RuleSet\Php74::create()
    ->withHeader('')
    ->withRules(PhpCsFixer\Config\Rules::fromArray([
        'constant_case' => false,
        'declare_strict_types' => false,
        'error_suppression' => false,
        'final_class' => false,
        'final_internal_class' => false,
        'final_public_method_for_abstract_class' => false,
        'header_comment' => false,
        'lowercase_keywords' => false,
        'magic_method_casing' => false,
        'native_function_casing' => false,
        'native_function_invocation' => false,
        'nullable_type_declaration' => false,
        'phpdoc_summary' => false,
        'protected_to_private' => false,
        'single_line_comment_style' => false,
        'static_lambda' => false,
        'static_private_method' => false,
    ]));

$finder = Finder::create()
    ->in(__DIR__ . '/test/Fixture/')
    ->notPath([
        'CallLikes/NoNamedArgumentRule/ClassUsingInvokableClass.php',
        'CallLikes/NoNamedArgumentRule/script.php',
        'Closures/NoNullableReturnTypeDeclarationRule/script.php',
        'Closures/NoParameterWithNullableTypeDeclarationRule/script.php',
        'Functions/NoNullableReturnTypeDeclarationRule/script.php',
        'Functions/NoParameterWithNullableTypeDeclarationRule/script.php',
        'Methods/NoNullableReturnTypeDeclarationRule/ClassWithMethodWithNullableUnionReturnTypeDeclaration.php',
        'Methods/NoNullableReturnTypeDeclarationRule/InterfaceWithMethodWithNullableUnionReturnTypeDeclaration.php',
        'Methods/NoNullableReturnTypeDeclarationRule/MethodInClassWithNullableUnionReturnTypeDeclaration.php',
        'Methods/NoNullableReturnTypeDeclarationRule/MethodInInterfaceWithNullableUnionReturnTypeDeclaration.php',
        'Methods/NoNullableReturnTypeDeclarationRule/script.php',
        'Methods/NoNullableReturnTypeDeclarationRule/TraitWithMethodWithNullableUnionReturnTypeDeclaration.php',
        'Methods/NoParameterWithNullableTypeDeclarationRule/ClassWithMethodWithParameterWithNullableUnionTypeDeclaration.php',
        'Methods/NoParameterWithNullableTypeDeclarationRule/InterfaceWithMethodWithParameterWithNullableUnionTypeDeclaration.php',
        'Methods/NoParameterWithNullableTypeDeclarationRule/script.php',
    ]);

$config = PhpCsFixer\Config\Factory::fromRuleSet($ruleSet);

$config->setCacheFile(__DIR__ . '/.build/php-cs-fixer/.php_cs.fixture.cache');
$config->setFinder($finder);

return $config;
