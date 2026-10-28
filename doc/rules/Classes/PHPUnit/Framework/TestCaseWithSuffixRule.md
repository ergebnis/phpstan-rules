# `Classes\PHPUnit\Framework\TestCaseWithSuffixRule`

This rule reports an error when a concrete class is a sub-class of `PHPUnit\Framework\TestCase` but does not have a `Test` suffix.

## Rationale

By default, PHPUnit only runs tests from files whose names end with `Test.php`, and the suffix tells readers which classes are tests.

## Parameters

### `enabled`

By default, this rule is enabled, unless you set the [`allRules`](../../../../../README.md#disabling-all-rules) parameter to `false`.

You can set the `enabled` parameter to `false` to disable this rule.

```neon
parameters:
	ergebnis:
		testCaseWithSuffix:
			enabled: false
```
