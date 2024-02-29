<?php

function insertAtBottom(&$stack, $x): void
{
    if ($stack->count() == 0) {
        $stack->push($x);
    } else {
        $a = $stack->top();
        $stack->pop();
        insertAtBottom($stack, $x);
        $stack->push($a);
    }
}

function reverseStack(&$stack): void
{
    if ($stack->count() > 0) {
        $x = $stack->top();
        $stack->pop();
        reverseStack($stack);
        insertAtBottom($stack, $x);
    }
    return;
}

$stack = new SplStack;
$stack->push(1);
$stack->push(2);
$stack->push(3);
$stack->push(4);
$stack->rewind();
echo "Stack is: ";
while ($stack->valid()) {
    echo $stack->current() . " ";
    $stack->next();
}
echo "<br/>\n";
reverseStack($stack);
$stack->rewind();
echo "Stack is: ";
while ($stack->valid()) {
    echo $stack->current() . " ";
    $stack->next();
}
echo "<br/>\n";
