<?php

function calculateSpan($price,$size,&$S){
    $stack = new SplStack();
    $stack->push(0);
    $S[0] = 1;

    for($i = 1; $i < $size; $i++){
        while(!$stack->isEmpty() && $price[$stack->top()] <= $price[$i]){
            $stack->pop();
        }
        $S[$i] = ($stack->isEmpty()) ? ($i + 1) : ($i - $stack->top()) ;
        $stack->push($i);
    }
}

function printArray($S,$size){
    for($i = 0; $i < $size; $i++){
        echo $S[$i]." ";
    }
    echo "<br/>";
}

$price = [ 10, 4, 5, 90, 120, 80 ];
$n = sizeof($price);
$S = array();

calculateSpan($price, $n, $S); 
printArray($S, $n);