<?php

function simplify($str){
    $len = strlen($str);
    $str = str_split($str);
    $res = array();
    $index = 0;
    $i = 0;
    $stack = new SplStack;
    $stack->push(0);
    while($i < $len){
        if($str[$i] == '(' && $i == 0){
            $i++;
        }
        if($str[$i] == '+'){
            if($stack->top() == 1){
                $res[$index++] = '-';
            }
            if($stack->top() == 0){
                $res[$index++] = '+';
            }
        }else if($str[$i] == '-'){
            if($stack->top() == 1){
                if($res[$index-1] == '+' || $res[$index-1] == '-') {
                    $res[$index-1] = '+';
                }else{
                    $res[$index++] = '+';
                }
            }else if($stack->top() == 0){
                if($res[$index-1] == '+' || $res[$index-1] == '-') {
                    $res[$index-1] = '-';
                }else{
                    $res[$index++] = '-';
                }
            }
        }else if($str[$i] == '(' && $i > 0){
            if($str[$i-1] == '-'){
                $x = ($stack->top() == 1) ? 0 : 1;
                $stack->push($x);
            }else if($str[$i-1] == '+'){
                $stack->push($stack->top());
            }
        }else if($str[$i] == ')'){
            $stack->pop();
        }else{
            $res[$index++] = $str[$i];
        }
        $i++;
    }
    return implode('',$res);
}

$s1 = "(a-(b+c)+d)";
$s2 = "a-(b-c-(d+e))-f";
echo simplify($s1) . "<br/>";
echo simplify($s2) . "<br/>";