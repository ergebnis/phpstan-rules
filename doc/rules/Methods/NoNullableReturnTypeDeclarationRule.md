# `Methods\NoNullableReturnTypeDeclarationRule`

This rule reports an error when a method declared in

- an anonymous class
- a class
- an interface

uses a nullable return type declaration.

## Parameters

### `enabled`

By default, this rule is enabled, unless you set the [`allRules`](../../../README.md#disabling-all-rules) parameter to `false`.

You can set the `enabled` parameter to `false` to disable this rule.

```neon
parameters:
	ergebnis:
		noNullableReturnTypeDeclaration:
			enabled: false
```

💡 The `enabled` parameter for `noNullableReturnTypeDeclaration` also enables or disables the following rules:

- [`ArrowFunctions\NoNullableReturnTypeDeclarationRule`](../../../doc/rules/ArrowFunctions/NoNullableReturnTypeDeclarationRule.md)
- [`Closures\NoNullableReturnTypeDeclarationRule`](../../../doc/rules/Closures/NoNullableReturnTypeDeclarationRule.md)
- [`Functions\NoNullableReturnTypeDeclarationRule`](../../../doc/rules/Functions/NoNullableReturnTypeDeclarationRule.md)
