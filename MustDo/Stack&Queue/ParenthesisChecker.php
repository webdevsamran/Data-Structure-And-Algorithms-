<?php

function ispar($s){
    $stack = new SplStack;
    $n = strlen($s);
    for($i = 0; $i < $n; $i++){
        if($s[$i] == '[' || $s[$i] == '{' || $s[$i] == '('){
            $stack->push($s[$i]);
        }else{
            if($s[$i] == ']' && $stack->top() == '['){
                $stack->pop();
                continue;
            }else if($s[$i] == '}' && $stack->top() == '{'){
                $stack->pop();
                continue;
            }else if($s[$i] == ')' && $stack->top() == '('){
                $stack->pop();
                continue;
            }
            return false;
        }
    }
    return true;
}

$s = "[()]{}{[()()]()}";
echo ispar($s);