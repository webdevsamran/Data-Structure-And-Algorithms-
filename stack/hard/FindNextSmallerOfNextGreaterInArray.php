<?php

function nextGreater($arr,$n,&$next,$order){
    $stack = new SplStack;
    for($i = $n-1; $i >= 0; $i--){
        while(!$stack->isEmpty() && (($order == 'G') ? $arr[$stack->top()] <= $arr[$i] : $arr[$stack->top()] >= $arr[$i])){
            $stack->pop();
        }
        if(!$stack->isEmpty()){
            $next[$i] = $stack->top();
        }else{
            $next[$i] = -1;
        }
        $stack->push($i);
    }
}

function nextSmallerOfNextGreater($arr,$n){
    $NG = array();
    $RS = array();

    nextGreater($arr, $n, $NG, 'G');
    nextGreater($arr, $n, $RS, 'S');

    for ($i = 0; $i < $n; $i++)
    {
        if ($NG[$i] != -1 && $RS[$NG[$i]] != -1)
            echo $arr[$RS[$NG[$i]]] . " ";
        else
            echo "-1 ";
    }
}

$arr = [5, 1, 9, 2, 5, 1, 7];
$n = sizeof($arr);
nextSmallerOfNextGreater($arr, $n);