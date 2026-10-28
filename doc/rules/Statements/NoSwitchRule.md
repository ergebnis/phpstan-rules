# `Statements\NoSwitchRule`

This rule reports an error when the statement [`switch()`](https://www.php.net/manual/control-structures.switch.php) is used.

## Parameters

### `enabled`

By default, this rule is enabled, unless you set the [`allRules`](../../../README.md#disabling-all-rules) parameter to `false`.

You can set the `enabled` parameter to `false` to disable this rule.

```neon
parameters:
	ergebnis:
		noSwitch:
			enabled: false
```
