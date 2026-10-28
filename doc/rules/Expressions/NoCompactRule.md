# `Expressions\NoCompactRule`

This rule reports an error when the function [`compact()`](https://www.php.net/compact) is used.

## Parameters

### `enabled`

By default, this rule is enabled, unless you set the [`allRules`](../../../README.md#disabling-all-rules) parameter to `false`.

You can set the `enabled` parameter to `false` to disable this rule.

```neon
parameters:
	ergebnis:
		noCompact:
			enabled: false
```
