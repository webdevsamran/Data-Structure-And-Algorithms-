<?php

function deleteMid(&$stack){
    $size = $stack->count();
    $tempStack = new SplStack;
    $count = 0;

    while($count < ceil($size / 2)){
        $tempStack->push($stack->pop());
        $count++;
    }

    $stack->pop();

    while(!$tempStack->isEmpty()){
        $stack->push($tempStack->pop());
    }
}

$stack = new SplStack;
$stack->push('1');
$stack->push('2');
$stack->push('3');
$stack->push('4');
$stack->push('5');
$stack->push('6');
$stack->push('7');
 
deleteMid($stack);

while (!$stack->isEmpty()) {
    $p = $stack->top();
    $stack->pop();
    echo $p . " ";
}