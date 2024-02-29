<?php

function getMaxArea($hist,$size){
    $stack = new SplStack;
    $max_area = 0;
    $area_with_top = NULL;

    $i = 0;
    while($i < $size){
        if($stack->isEmpty() || ($hist[$stack->top()] <= $hist[$i])){
            $stack->push($i++);
        }else{
            $tp = $stack->pop();
            $area_with_top = $hist[$tp] * ($stack->isEmpty() ? $i : $i - $stack->top() - 1);
        }
        if($max_area < $area_with_top){
            $max_area = $area_with_top;
        }
    }

    while(!$stack->isEmpty()){
        $tp = $stack->pop();
        $area_with_top = $hist[$tp] * ($stack->isEmpty() ? $i : $i - $stack->top() - 1);
        if($max_area < $area_with_top){
            $max_area = $area_with_top;
        }
    }

    return $max_area;
}

$hist = [ 6, 2, 5, 4, 5, 1, 6 ];
$n = sizeof($hist);

echo "Maximum area is " . getMaxArea($hist, $n);