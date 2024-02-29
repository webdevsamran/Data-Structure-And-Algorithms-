<?php

function nextLargerElement($arr,$n){
    $stack = new SplStack;
    $res = array();
    for($i = $n - 1; $i >= 0; $i--){
        if($stack->isEmpty()){
            array_push($res,-1);
            $stack->push($arr[$i]);
        }else if(!$stack->isEmpty() && $stack->top() > $arr[$i]){
            array_push($res,$stack->top());
            $stack->push($arr[$i]);
        }else if(!$stack->isEmpty() && $stack->top() <= $arr[$i]){
            while(!$stack->isEmpty() && $stack->top() <= $arr[$i]){
                $stack->pop();
            }
            if($stack->isEmpty()){
                array_push($res,-1);
            }else{
                array_push($res,$stack->top());
            }
            $stack->push($arr[$i]);
        }
    }
    $res = array_reverse($res);
    return $res;
}

$n = 4;
$arr = [1, 3, 2, 4];
print_r(nextLargerElement($arr,$n));