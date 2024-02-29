<?php

function decodeString($str){
    $stack = new SplStack;
    $len = strlen($str);

    for($i = 0; $i < $len; $i++){
        if($str[$i] == ']'){
            $temp = NULL;
            while(!$stack->isEmpty() && $stack->top() != '['){
                $temp = $stack->pop() . $temp;
            }
            $stack->pop();
            $num = NULL;
            while(!$stack->isEmpty() && is_numeric($stack->top())){
                $num = (int)$stack->pop() + $num;
            }
            $number = $num;
            $repeat = '';
            for($j = 0; $j < $number; $j++)
                $repeat .= $temp;
            $repeat = str_split($repeat);
            foreach($repeat as $c)
                $stack->push($c);
        }else{
            $stack->push($str[$i]);
        }
    }

    $res = '';
    while (!$stack->isEmpty()) {
        $res = $stack->pop() . $res;
    }
    return $res;
}

$str = "3[b2[ca]]";
echo decodeString($str);