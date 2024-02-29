<?php

function calculateSpan($price,$n,&$S){
    $stack = new SplStack;
    $stack->push(0);
    $S[0] = 1;
    for($i = 1; $i < $n; $i++){
        while(!$stack->isEmpty() && $price[$stack->top()] <= $price[$i]){
            $stack->pop();
        }
        $S[$i] = ($stack->isEmpty()) ? ($i + 1) : ($i - $stack->top());
        $stack->push($i);
    }
}

$price = [ 10, 4, 5, 90, 120, 80 ];
$n = sizeof($price);
$S = array();
calculateSpan($price, $n, $S);
print_r($S);