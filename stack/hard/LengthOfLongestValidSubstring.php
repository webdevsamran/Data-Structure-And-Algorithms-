<?php

function findMaxLen($str){
    $len = strlen($str);
    $result = 0;
    $stack = new SplStack;
    $stack->push(-1);
    for($i = 0; $i < $len; $i++){
        if($str[$i] == '('){
            $stack->push($i);
        }else{
            if(!$stack->isEmpty()){
                $stack->pop();
            }
            if(!$stack->isEmpty()){
                $result = max($result,$i - $stack->top());
            }else{
                $stack->push($i);
            }
        }
    }
    return $result;
}

$str = "((()()";
echo findMaxLen($str) . "<br/>";
$str = "()(()))))";
echo findMaxLen($str) . "<br/>";