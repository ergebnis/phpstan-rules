# `Methods\NoConstructorParameterWithDefaultValueRule`

This rule reports an error when a constructor declared in

- an anonymous class
- a class

has a default value.

## Parameters

### `enabled`

By default, this rule is enabled, unless you set the [`allRules`](../../../README.md#disabling-all-rules) parameter to `false`.

You can set the `enabled` parameter to `false` to disable this rule.

```neon
parameters:
	ergebnis:
		noConstructorParameterWithDefaultValue:
			enabled: false
```
