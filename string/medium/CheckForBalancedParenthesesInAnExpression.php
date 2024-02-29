<?php

function isBalanced($str){
    $len = strlen($str);
    $stack = new SplStack;
    
    if($str[0] == ']' || $str[0] == ')' || $str[0] == '}'){
        return false;
    }

    $stack->push($str[0]);

    for($i = 1; $i < $len; $i++){
        if($str[$i] == '[' || $str[$i] == '(' || $str[$i] == '{'){
            $stack->push($str[$i]);
        }else{
            if($stack->isEmpty()){
                return false;
            }
            if($str[$i] == ']'){
                $el = $stack->pop();
                if($el = '[' && $str[$i] == ']'){
                    continue;
                }else{
                    return false;
                }
            }
            if($str[$i] == ')'){
                $el = $stack->pop();
                if($el = '(' && $str[$i] == ')'){
                    continue;
                }else{
                    return false;
                }
            }
            if($str[$i] == '}'){
                $el = $stack->pop();
                if($el = '{' && $str[$i] == '}'){
                    continue;
                }else{
                    return false;
                }
            }
            return false;
        }
    }

    return true;
}

$X = "[()]()";
if (isBalanced($X))
    echo "Yes";
else
    echo "No";

$Y = "[[()]])";
if (isBalanced($Y))
    echo "Yes";
else
    echo "No";