# `Files\DeclareStrictTypesRule`

This rule reports an error when a non-empty file does not contain a `declare(strict_types=1)` declaration.

## Parameters

### `enabled`

By default, this rule is enabled, unless you set the [`allRules`](../../../README.md#disabling-all-rules) parameter to `false`.

You can set the `enabled` parameter to `false` to disable this rule.

```neon
parameters:
	ergebnis:
		declareStrictTypes:
			enabled: false
```
