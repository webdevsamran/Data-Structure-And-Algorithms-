<?php

function printMaxOfMin($arr,$size){
    $stack = new SplStack;
    $left = array();
    $right = array();

    for($i = 0; $i < $size; $i++){
        $left[$i] = -1;
        $right[$i] = $size;
    }

    for($i = 0; $i < $size; $i++){
        while(!$stack->isEmpty() && $arr[$stack->top()] >= $arr[$i]){
            $stack->pop();
        }
        if(!$stack->isEmpty()){
            $left[$i] = $stack->top();
        }
        $stack->push($i);
    }

    while(!$stack->isEmpty()){
        $stack->pop();
    }

    for($i = $size - 1; $i >= 0; $i--){
        while(!$stack->isEmpty() && $arr[$stack->top()] >= $arr[$i]){
            $stack->pop();
        }
        if(!$stack->isEmpty()){
            $right[$i] = $stack->top();
        }
        $stack->push($i);
    }

    $ans = array_fill(0,$size+1,0);

    for($i = 0; $i < $size; $i++){
        $len = $right[$i] - $left[$i] - 1;
        $ans[$len] = max($ans[$len],$arr[$i]);
    }

    for($i = $size - 1; $i >= 1; $i--)
        $ans[$i] = max($ans[$i], $ans[$i + 1]);
 
    for($i = 1; $i <= $size; $i++)
        echo $ans[$i] . " ";
}

$arr = [ 10, 20, 30, 50, 10, 70, 30 ];
$n = sizeof($arr);
printMaxOfMin($arr, $n);