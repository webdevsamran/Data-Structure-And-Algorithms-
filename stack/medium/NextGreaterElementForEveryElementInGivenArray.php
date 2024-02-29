<?php

function printNGE($arr,$size){
    $stack = new SplStack;
    $stack->push($arr[0]);
    
    for($i = 1; $i < $size; $i++){
        if($stack->isEmpty()){
            $stack->push($arr[$i]);
            continue;
        }

        while(!$stack->isEmpty() && $stack->top() < $arr[$i]){
            echo $stack->top()." -- ".$arr[$i]."<br/>";
            $stack->pop();
        }

        $stack->push($arr[$i]);
    }

    while(!$stack->isEmpty()){
        echo $stack->top()." --  -1<br/>";
        $stack->pop();
    }
}

$arr = [ 11, 13, 21, 3 ];
$n = sizeof($arr);
printNGE($arr, $n);