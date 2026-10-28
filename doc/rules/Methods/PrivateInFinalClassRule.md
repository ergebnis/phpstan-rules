# `Methods\PrivateInFinalClassRule`

This rule reports an error when a method in a `final` class is `protected` but could be `private`.

## Rationale

A `final` class cannot be extended, so a `protected` method in it can only be used like a `private` method. Declaring the method `private` makes that explicit.

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
