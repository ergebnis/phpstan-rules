# `Methods\NoParameterWithNullDefaultValueRule`

This rule reports an error when a method declared in

- an anonymous class
- a class
- an interface

has a parameter with `null` as default value.

## Rationale

A parameter with `null` as its default value makes the argument optional and nullable at once, so the method has to handle a missing value. Separate methods or a null object make each case explicit.

## Parameters

### `enabled`

By default, this rule is enabled, unless you set the [`allRules`](../../../README.md#disabling-all-rules) parameter to `false`.

You can set the `enabled` parameter to `false` to disable this rule.

```neon
parameters:
	ergebnis:
		noParameterWithNullDefaultValue:
			enabled: false
```

💡 The `enabled` parameter for `noParameterWithNullDefaultValue` also enables or disables the following rules:

- [`ArrowFunctions\NoParameterWithNullDefaultValueRule`](../../../doc/rules/ArrowFunctions/NoParameterWithNullDefaultValueRule.md)
- [`Closures\NoParameterWithNullDefaultValueRule`](../../../doc/rules/Closures/NoParameterWithNullDefaultValueRule.md)
- [`Functions\NoParameterWithNullDefaultValueRule`](../../../doc/rules/Functions/NoParameterWithNullDefaultValueRule.md)
