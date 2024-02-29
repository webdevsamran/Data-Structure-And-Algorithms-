<?php

function next_greatest(&$next,$a,$n){
    $stack = new SplStack;
    $stack->push(0);
    for($i = 1; $i < $n; $i++){
        while(!$stack->isEmpty()){
            $cur = $stack->top();
            if($a[$cur] < $a[$i]){
                $next[$cur] = $i;
                $stack->pop();
            }else{
                break;
            }
        }
        $stack->push($i);
    }
    while(!$stack->isEmpty()){
        $cur = $stack->pop();
        $next[$cur] = -1;
    }
}

function answer_query($a,$next,$n,$i){
    $position = $next[$i];
    if($position == -1){
        return -1;
    }
    return $a[$position];
}

$a = [3, 4, 2, 7, 5, 8, 10, 6 ];
$n = sizeof($a);
$next = array_fill(0,$n,0);

next_greatest($next, $a, $n);
echo answer_query($a, $next, $n, 3) . "<br/>";
echo answer_query($a, $next, $n, 6) . "<br/>";
echo answer_query($a, $next, $n, 1) . "<br/>";