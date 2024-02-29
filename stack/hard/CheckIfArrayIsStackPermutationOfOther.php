<?php

function checkStackPermutation($in,$out,$n){
    $stack = new SplStack;
    $j = 0;
    for($i = 0; $i < $n; $i++){
        $stack->push($in[$i]);
        while(!$stack->isEmpty() && $stack->top() == $out[$j]){
            $stack->pop();
            $j++;
        }
    }
    if($stack->isEmpty()){
        return true;
    }
    return false;
}

$input = [4,5,6,7,8];
$output = [8,7,6,5,4];
$n = 5;
if (checkStackPermutation($input, $output, $n))
    echo "Yes";
else
    echo "Not Possible";