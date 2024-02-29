<?php

function reverseWords($s){
    $stack = new SplStack;
    $result = '';
    $n = strlen($s);
    for($i = $n - 1; $i >= 0; $i--){
        if($s[$i] != '.'){
            $stack->push($s[$i]);
        }else{
            while(!$stack->isEmpty()){
                $result .= $stack->pop();
            }
            $result .= '.';
        }
    }
    while(!$stack->isEmpty()){
        $result .= $stack->pop();
    }
    return $result;
}

$s = "i.like.this.program.very.much";
echo reverseWords($s);