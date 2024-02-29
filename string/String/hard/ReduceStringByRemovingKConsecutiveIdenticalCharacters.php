<?php

function remove_k_char($k,$s){
    if($k == 1){
        return "";
    }
    $output = '';
    $stack = new SplStack;
    for($i = 0; $i < strlen($s); $i++){
        if($stack->isEmpty()){
            $stack->push([$s[$i],1]);
        }else{
            if($s[$i] == $stack->top()[0]){
                $P = $stack->pop();
                $P[1]++;
                if($P[1] == $k){
                    continue;
                }else{
                    $stack->push($P);
                }
            }else{
                $stack->push([$s[$i],1]);
            }
        }
    }
    while(!$stack->isEmpty()){
        if($stack->top()[1] > 1){
            $count = $stack->top()[1];
            while($count--){
                $output .= $stack->top()[0];
            }
        }else{
            $output .= $stack->top()[0];
        }
        $stack->pop();
    }
    $output = strrev($output);
    return $output;
}

$s = "geeksforgeeks";
$k = 2;
echo remove_k_char($k, $s);