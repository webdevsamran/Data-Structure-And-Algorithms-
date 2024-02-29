<?php

function sortStack($stack){
    $tmpStack = new SplStack;
    while(!$stack->isEmpty()){
        $tmp = $stack->pop();

        while(!$tmpStack->isEmpty() && $tmp < $tmpStack->top()){
            $stack->push($tmpStack->pop());
        }

        $tmpStack->push($tmp);
    }
    return $tmpStack;
}

$input = new SplStack;
$input->push(34);
$input->push(3);
$input->push(31);
$input->push(98);
$input->push(92);
$input->push(23);
 

$tmpStack = sortStack($input);
echo "Sorted numbers are:<br/>";

while(!$tmpStack->isEmpty())
{
    echo $tmpStack->top() . " ";
    $tmpStack->pop();
}