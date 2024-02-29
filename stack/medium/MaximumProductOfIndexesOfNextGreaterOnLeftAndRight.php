<?php

$stack = new SplStack;

function nextGreaterToLeft($arr,&$res,$size){
    global $stack;
    $stack->push(0);
    $res[0] = 0;

    for($i = 1; $i < $size; $i++){
        while(!$stack->isEmpty() && $arr[$stack->top()] <= $arr[$i]){
            $stack->pop();
        }
        $res[$i] = ($stack->isEmpty()) ? 0 : $stack->top() + 1;
        $stack->push($i);
    }
}

function nextGreaterToRight($arr,&$res,$size){
    global $stack;
    $stack = new SplStack;
    $stack->push($size-1);
    $res[$size-1] *= 0;

    for($i = $size - 2; $i >= 0; $i--){
        while(!$stack->isEmpty() && $arr[$stack->top()] <= $arr[$i]){
            $stack->pop();
        }
        $res[$i] = ($stack->isEmpty()) ? $res[$i] * 0: $res[$i] * ($stack->top()+1);
        $stack->push($i);
    }
}

function maxProduct($arr,$res,$size){
    nextGreaterToLeft($arr,$res,$size);
    nextGreaterToRight($arr,$res,$size);

    $Max = $res[0];
    for($i = 1; $i < $size; $i++){
        $Max = max($Max, $res[$i]);
    }
    return $Max;
}

$arr = [5, 4, 3, 4, 5];
$N = sizeof($arr);
$res = array();
    
$maxprod = maxProduct($arr, $res, $N);
echo $maxprod ."<br/>";