# `Expressions\NoAssignByReferenceRule`

This rule reports an error when [a variable is assigned by reference](https://www.php.net/manual/en/language.references.whatdo.php#language.references.whatdo.assign).

## Parameters

### `enabled`

By default, this rule is enabled, unless you set the [`allRules`](../../../README.md#disabling-all-rules) parameter to `false`.

You can set the `enabled` parameter to `false` to disable this rule.

```neon
parameters:
	ergebnis:
		noAssignByReference:
			enabled: false
```
