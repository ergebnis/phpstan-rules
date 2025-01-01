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

use Ergebnis\PhpCsFixer;

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
        'nullable_type_declaration' => false,
        'protected_to_private' => false,
        'static_lambda' => false,
    ]));

$config = PhpCsFixer\Config\Factory::fromRuleSet($ruleSet);

$config->getFinder()
    ->in(__DIR__ . '/test/Fixture/')
    ->notPath([
        'Classes/PHPUnit/Framework/TestCaseWithSuffixRule/Success/ImplicitlyAbstractTestCase.php',
        'Closures/NoNullableReturnTypeDeclarationRule/Failure/closure-with-nullable-union-type-return-type-declaration.php',
        'Closures/NoParameterWithNullableTypeDeclarationRule/Failure/closure-with-parameter-with-nullable-union-type-declaration.php',
        'Functions/NoNullableReturnTypeDeclarationRule/Failure/function-with-nullable-union-return-type-declaration.php',
        'Functions/NoParameterWithNullableTypeDeclarationRule/Failure/function-with-parameter-with-nullable-union-type-declaration.php',
        'Methods/NoNullableReturnTypeDeclarationRule/Failure/MethodInAnonymousClassWithNullableUnionReturnTypeDeclaration.php',
        'Methods/NoNullableReturnTypeDeclarationRule/Failure/MethodInClassWithNullableUnionReturnTypeDeclaration.php',
        'Methods/NoNullableReturnTypeDeclarationRule/Failure/MethodInInterfaceWithNullableUnionReturnTypeDeclaration.php',
        'Methods/NoParameterWithNullableTypeDeclarationRule/Failure/method-in-anonymous-class-with-parameter-with-nullable-union-type-declaration.php',
        'Methods/NoParameterWithNullableTypeDeclarationRule/Failure/MethodInClassWithParameterWithNullableUnionTypeDeclaration.php',
        'Methods/NoParameterWithNullableTypeDeclarationRule/Failure/MethodInInterfaceWithParameterWithNullableUnionTypeDeclaration.php',
    ]);

$config->setCacheFile(__DIR__ . '/.build/php-cs-fixer/.php_cs.fixture.cache');

return $config;
