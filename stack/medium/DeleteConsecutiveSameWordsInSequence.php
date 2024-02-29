<?php

function removeConsecutiveSame($words){
    $stack = new SplStack;
    $size = sizeof($words);

    for($i = 0; $i < $size; $i++){
        if($stack->isEmpty()){
            $stack->push($words[$i]);
        }else{
            $word = $stack->top();
            if($word == $words[$i]){
                $stack->pop();
            }else{
                $stack->push($words[$i]);
            }
        }
    }

    return $stack->count();
}

$v = [ "tom", "jerry", "jerry", "tom"];
echo removeConsecutiveSame($v);