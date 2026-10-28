# `Expressions\NoEvalRule`

This rule reports an error when the language construct [`eval()`](https://www.php.net/eval) is used.

## Parameters

### `enabled`

By default, this rule is enabled, unless you set the [`allRules`](../../../README.md#disabling-all-rules) parameter to `false`.

You can set the `enabled` parameter to `false` to disable this rule.

```neon
parameters:
	ergebnis:
		noEval:
			enabled: false
```
