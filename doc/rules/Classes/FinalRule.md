# `Classes\FinalRule`

This rule reports an error when a non-anonymous class is not `final`.

💡 This rule ignores classes that

- use `@Entity`, `@ORM\Entity`, or `@ORM\Mapping\Entity` annotations
- use `Doctrine\ORM\Mapping\Entity` attributes

on the class level.

## Rationale

A class that is not `final` can be extended, so every change to it can break a subclass. Declare classes `final` and prefer composition over inheritance.

## Parameters

### `enabled`

By default, this rule is enabled, unless you set the [`allRules`](../../../README.md#disabling-all-rules) parameter to `false`.

You can set the `enabled` parameter to `false` to disable this rule.

```neon
parameters:
	ergebnis:
		final:
			enabled: false
```

### `allowAbstractClasses`

By default, this rule allows to declare `abstract` classes.

You can set the `allowAbstractClasses` parameter to `false` to disallow abstract classes.

Default value: `true`

Example:

```neon
parameters:
	ergebnis:
		final:
			allowAbstractClasses: false
```

### `classesNotRequiredToBeAbstractOrFinal`

You can set the `classesNotRequiredToBeAbstractOrFinal` parameter to a list of class names that you want to exclude from inspection.

Default value: `[]`

Example:

```neon
parameters:
	ergebnis:
		final:
			classesNotRequiredToBeAbstractOrFinal:
				- Foo\Bar\NeitherAbstractNorFinal
				- Bar\Baz\NeitherAbstractNorFinal
```
