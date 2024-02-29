<?php

function pushDigits(&$stack,$number){
    while($number != 0){
        $stack->push($number%10);
        $number = (int)($number / 10);
    }
}

function reverse_number($number){
    $stack = new SplStack;
    pushDigits($stack,$number);
    print_r($stack);

    $reverse = 0;
    $i = 1;

    while(!$stack->isEmpty()){
        $num = $stack->pop();
        $reverse += $num * $i;
        $i *= 10;
    }

    return $reverse;
}

$number = 39997;

echo reverse_number($number);