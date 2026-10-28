# `Expressions\NoErrorSuppressionRule`

This rule reports an error when [`@`](https://www.php.net/manual/en/language.operators.errorcontrol.php) is used to suppress errors.

## Parameters

### `enabled`

By default, this rule is enabled, unless you set the [`allRules`](../../../README.md#disabling-all-rules) parameter to `false`.

You can set the `enabled` parameter to `false` to disable this rule.

```neon
parameters:
	ergebnis:
		noErrorSuppression:
			enabled: false
```
