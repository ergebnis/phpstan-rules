# `PropertyHooks\NoParameterWithNullableTypeDeclarationRule`

This rule reports an error when a [property hook](https://www.php.net/manual/en/language.oop5.property-hooks.php) has a parameter with a nullable type declaration.

## Rationale

A parameter with a nullable type declaration makes the property hook handle two cases: a value and `null`. Separate properties or a null object make each case explicit.

## Parameters

### `enabled`

By default, this rule is enabled, unless you set the [`allRules`](../../../README.md#disabling-all-rules) parameter to `false`.

You can set the `enabled` parameter to `false` to disable this rule.

```neon
parameters:
	ergebnis:
		noParameterWithNullableTypeDeclaration:
			enabled: false
```

💡 The `enabled` parameter for `noParameterWithNullableTypeDeclaration` also enables or disables the following rules:

- [`ArrowFunctions\NoParameterWithNullableTypeDeclarationRule`](../../../doc/rules/ArrowFunctions/NoParameterWithNullableTypeDeclarationRule.md)
- [`Closures\NoParameterWithNullableTypeDeclarationRule`](../../../doc/rules/Closures/NoParameterWithNullableTypeDeclarationRule.md)
- [`Functions\NoParameterWithNullableTypeDeclarationRule`](../../../doc/rules/Functions/NoParameterWithNullableTypeDeclarationRule.md)
- [`Methods\NoParameterWithNullableTypeDeclarationRule`](../../../doc/rules/Methods/NoParameterWithNullableTypeDeclarationRule.md)
