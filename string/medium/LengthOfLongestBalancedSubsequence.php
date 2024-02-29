<?php

function maxLength($str){
    if($str == NULL){
        return 0;
    }

    $len = strlen($str);
    $stack = new SplStack;

    $stack->push($str[0]);
    $count = 0;

    for($i = 1; $i < $len; $i++){
        if($str[$i] == '[' || $str[$i] == '(' || $str[$i] == '{'){
            $stack->push($str[$i]);
        }else{
            if($stack->isEmpty()){
                continue;
            }
            if($str[$i] == ']'){
                $el = $stack->pop();
                if($el = '[' && $str[$i] == ']'){
                    $count+=2;
                    continue;
                }
            }
            if($str[$i] == ')'){
                $el = $stack->pop();
                if($el = '(' && $str[$i] == ')'){
                    $count+=2;
                    continue;
                }
            }
            if($str[$i] == '}'){
                $el = $stack->pop();
                if($el = '{' && $str[$i] == '}'){
                    $count+=2;
                    continue;
                }
            }
        }
    }

    return $count;
}

$s = "()())";
echo maxLength($s);