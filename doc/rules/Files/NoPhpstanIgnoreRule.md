# `Files\NoPhpstanIgnoreRule`

This rule reports an error when a `@phpstan-ignore`, `@phpstan-ignore-line`, or `@phpstan-ignore-next-line` tag is used to [ignore errors reported by `phpstan/phpstan`](https://phpstan.org/user-guide/ignoring-errors#ignoring-in-code-using-phpdocs).

## Parameters

### `enabled`

By default, this rule is enabled, unless you set the [`allRules`](../../../README.md#disabling-all-rules) parameter to `false`.

You can set the `enabled` parameter to `false` to disable this rule.

```neon
parameters:
	ergebnis:
		noPhpstanIgnore:
			enabled: false
```
