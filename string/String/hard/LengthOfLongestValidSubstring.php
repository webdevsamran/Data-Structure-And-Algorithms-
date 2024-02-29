<?php

function findMaxLen($str){
    $n = strlen($str);
    $str = str_split($str);
    $result = 0;
    $stack = new SplStack;
    $stack->push(-1);
    for($i = 0; $i < $n; $i++){
        if($str[$i] == '('){
            $stack->push($i);
        }else{
            if(!$stack->isEmpty()){
                $stack->pop();
            }
            if(!$stack->isEmpty()){
                $result = max($result, $i - $stack->top());
            }else{
                $stack->push($i);
            }
        }
    }
    return $result;
}

$str = "((()()";
echo findMaxLen($str);