# `Methods\PrivateInFinalClassRule`

This rule reports an error when a method in a `final` class is `protected` but could be `private`.

## Parameters

### `enabled`

By default, this rule is enabled, unless you set the [`allRules`](../../../README.md#disabling-all-rules) parameter to `false`.

You can set the `enabled` parameter to `false` to disable this rule.

```neon
parameters:
	ergebnis:
		privateInFinalClass:
			enabled: false
```
