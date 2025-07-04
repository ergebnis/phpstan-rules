<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\CallLikes\NoNamedArgumentRule;

json_encode(null);
json_encode(value: null);
\json_encode(value: 'foo');

function foo($bar = null)
{
}

foo();
foo(2000);
foo(bar: 2000);
foo(...);

$bar = function ($baz = null) {

};

$bar();
$bar(2000);
$bar(baz: 2000);
$bar(...);

new ExampleClass();
new ExampleClass(1);
new ExampleClass(bar: 1);

ExampleClass::create(1);
ExampleClass::create(bar: 1);

$exampleClass = new ExampleClass();

$exampleClass->bar(1, 2);
$exampleClass->bar(baz: 1, 2);

new ExampleClassExtendingAbstractClass();
new ExampleClassExtendingAbstractClass(1);
new ExampleClassExtendingAbstractClass(bar: 1);

ExampleClassExtendingAbstractClass::create(1);
ExampleClassExtendingAbstractClass::create(bar: 1);

$exampleClassExtendingAbstractClass = new ExampleClassExtendingAbstractClass();

$exampleClassExtendingAbstractClass->bar(1, 2);
$exampleClassExtendingAbstractClass->bar(baz: 1, 2);

new ExampleClassExtendingAbstractClassAndImplementingExampleInterface();
new ExampleClassExtendingAbstractClassAndImplementingExampleInterface(1);
new ExampleClassExtendingAbstractClassAndImplementingExampleInterface(bar: 1);

ExampleClassExtendingAbstractClassAndImplementingExampleInterface::create(1);
ExampleClassExtendingAbstractClassAndImplementingExampleInterface::create(bar: 1);

$exampleClassExtendingAbstractClassAndImplementingInterface = new ExampleClassExtendingAbstractClassAndImplementingExampleInterface();

$exampleClassExtendingAbstractClassAndImplementingInterface->bar(1, 2);
$exampleClassExtendingAbstractClassAndImplementingInterface->bar(baz: 1, 2);

new ExampleClassImplementingExampleInterface();
new ExampleClassImplementingExampleInterface(1);
new ExampleClassImplementingExampleInterface(bar: 1);

ExampleClassImplementingExampleInterface::create(1);
ExampleClassImplementingExampleInterface::create(bar: 1);

$exampleClassImplementingInterface = new ExampleClassImplementingExampleInterface();

$exampleClassImplementingInterface->bar(1, 2);
$exampleClassImplementingInterface->bar(baz: 1, 2);

new OtherExampleClassExtendingExampleClass();
new OtherExampleClassExtendingExampleClass(1);
new OtherExampleClassExtendingExampleClass(bar: 1);

OtherExampleClassExtendingExampleClass::create(1);
OtherExampleClassExtendingExampleClass::create(bar: 1);

$otherExampleClassExtendingExampleClass = new OtherExampleClassExtendingExampleClass();

$otherExampleClassExtendingExampleClass->bar(1, 2);
$otherExampleClassExtendingExampleClass->bar(baz: 1, 2);

new OtherExampleClassExtendingExampleClassExtendingAbstractClassAndImplementingExampleInterface();
new OtherExampleClassExtendingExampleClassExtendingAbstractClassAndImplementingExampleInterface(1);
new OtherExampleClassExtendingExampleClassExtendingAbstractClassAndImplementingExampleInterface(bar: 1);

OtherExampleClassExtendingExampleClassExtendingAbstractClassAndImplementingExampleInterface::create(1);
OtherExampleClassExtendingExampleClassExtendingAbstractClassAndImplementingExampleInterface::create(bar: 1);

$otherExampleClassExtendingExampleClassExtendingAbstractClassAndImplementingExampleInterface = new OtherExampleClassExtendingExampleClassExtendingAbstractClassAndImplementingExampleInterface();

$otherExampleClassExtendingExampleClassExtendingAbstractClassAndImplementingExampleInterface->bar(1, 2);
$otherExampleClassExtendingExampleClassExtendingAbstractClassAndImplementingExampleInterface->bar(baz: 1, 2);

$anonymousClass = new class() implements ExampleInterface {
    public function __construct($bar = null)
    {
    }

    public function bar($baz, $qux): void
    {
    }

    public static function create($bar = null): ExampleInterface
    {
    }
};

$anonymousClass->bar(1, 2);
$anonymousClass->bar(baz: 1, 2);

$exampleClass::create(1);
$exampleClass::create(bar: 1);

$anonymousClass::create(1);
$anonymousClass::create(bar: 1);

$invokableClass = new InvokableClass();

$invokableClass(1);
$invokableClass(bar: 1);

$staticClassMethodCallable = [
    ExampleClass::class,
    'create'
];

$staticClassMethodCallable(1);
$staticClassMethodCallable(bar: 1);

$dynamicClassMethodCallable = [
    $exampleClass,
    'bar'
];

$dynamicClassMethodCallable(1);
$dynamicClassMethodCallable(bar: 1);

$firstClassCallable = $exampleClass->bar(...);

$firstClassCallable(1);
$firstClassCallable(bar: 1);

$classUsingInvokableClass = new ClassUsingInvokableClass(new InvokableClass());

($classUsingInvokableClass->baz())(1);
($classUsingInvokableClass->baz())(bar: 1);

$className = ExampleClass::class;

new $className();
new $className(1);
new $className(bar: 1);
