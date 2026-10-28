# `Methods\FinalInAbstractClassRule`

This rule reports an error when a concrete `public` or `protected` method in an `abstract` class is not `final`.

💡 This rule ignores

- Doctrine embeddables
- Doctrine entities

## Rationale

A concrete method in an `abstract` class that is not `final` can be overridden by subclasses, which can break the assumptions of the abstract class. Declare the method `final`, or `abstract` when subclasses need to provide it.

## Parameters

### `enabled`

By default, this rule is enabled, unless you set the [`allRules`](../../../README.md#disabling-all-rules) parameter to `false`.

You can set the `enabled` parameter to `false` to disable this rule.

```neon
parameters:
	ergebnis:
		finalInAbstractClass:
			enabled: false
```
