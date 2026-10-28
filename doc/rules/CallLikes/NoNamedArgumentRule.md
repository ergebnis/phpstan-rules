# `CallLikes\NoNamedArgumentRule`

This rule reports an error when an anonymous function, a function, or a method is invoked using a [named argument](https://www.php.net/manual/en/functions.arguments.php#functions.named-arguments).

## Parameters

### `enabled`

By default, this rule is enabled, unless you set the [`allRules`](../../../README.md#disabling-all-rules) parameter to `false`.

You can set the `enabled` parameter to `false` to disable this rule.

```neon
parameters:
	ergebnis:
		noNamedArgument:
			enabled: false
```
