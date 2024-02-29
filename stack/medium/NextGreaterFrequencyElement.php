<?php

function getFirst($stack){
    $data = $stack->top();
    return $data[0];
}

function getSecond($stack){
    $data = $stack->top();
    return $data[1];
}

function NGF($arr,&$res,$size){
    $stack = new SplStack;
    $mp = array();

    for($i = 0; $i < $size; $i++){
        if(!array_key_exists($arr[$i],$mp)){
            $mp[$arr[$i]] = 0;
        }
        $mp[$arr[$i]]++;
    }

    $curr_freq = $mp[$arr[$size-1]];
    $stack->push([$arr[$size-1],$curr_freq]);
    $res[$size-1] = -1;

    for($i = $size - 2; $i >= 0; $i--){
        $curr_freq = $mp[$arr[$i]];
        while(!$stack->isEmpty() && $curr_freq >= getSecond($stack)){
            $stack->pop();
        }
        $res[$i] = ($stack->isEmpty()) ? -1 : getFirst($stack);
        $stack->push([$arr[$i],$mp[$arr[$i]]]);
    }
}

$arr = [1, 1, 1, 2, 2, 2, 2, 11, 3, 3];
$n = sizeof($arr);
$res = array();

NGF($arr, $res, $n);
echo "[";
for($i = 0; $i < $n - 1; $i++)
{
    echo $res[$i] . ", ";
}
echo $res[$n - 1] . "]";