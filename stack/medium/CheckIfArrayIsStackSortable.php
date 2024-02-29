<?php

function check($arr,$size){
    $stack = new SplStack;
    $b_end = 0;

    for($i = 0; $i < $size; $i++){
        if(!$stack->isEmpty()){
            $top = $stack->top();
            while($top == $b_end+1){
                $b_end++;
                $stack->pop();
                if($stack->isEmpty()){
                    break;
                }
                $top = $stack->top();
            }
            if($stack->isEmpty()){
                $stack->push($arr[$i]);
            }else{
                $top = $stack->top();
                if($arr[$i] < $top){
                    $stack->push($arr[$i]);
                }else{
                    return false;
                }
            }
        }else{
            $stack->push($arr[$i]);
        }
    }
    return true;
}

$A = [ 4, 1, 2, 3 ];
$N = sizeof($A);
echo check($A, $N) ? "YES": "NO";  