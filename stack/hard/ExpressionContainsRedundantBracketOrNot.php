<?php

function checkRedundancy($str){
    $stack = new SplStack;
    $str = str_split($str);
    foreach($str as $ch){
        if($ch == ')'){
            $top = $stack->pop();
            $flag = true;
            while(!$stack->isEmpty() && $stack->top() != '('){
                if($top == '+' || $top == '-' || $top == '*' || $top == '/'){
                    $flag = false;
                }
                $top = $stack->pop();
            }
            if($flag == true){
                return true;
            }
        }else{
            $stack->push($ch);
        }
    }
    return false;
}

function findRedundant($str){
    $ans = checkRedundancy($str);
    if($ans){
        echo "Yes";
    }else{
        echo "No";
    }
}

$str = "((a+b))";
findRedundant($str);