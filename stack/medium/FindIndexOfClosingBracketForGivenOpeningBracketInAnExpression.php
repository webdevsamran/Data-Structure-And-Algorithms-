<?php

function test($str,$index){
    if($str[$index] != '['){
        echo $str . ", " . $index . ": -1<br/>";
        return;
    }
    $len = strlen($str);
    $stack = new SplStack;
    for($i = $index; $i < $len; $i++){
        if($str[$i] == '['){
            $stack->push($str[$index]);
        }else if($str[$i] == ']'){
            $stack->pop();
            if($stack->isEmpty()){
                echo $str . ", " . $index . ": " . $i . "<br/>";
                return;
            }
        }
    }
    echo $str . ", " . $index . ": -1<br/>";
    return;
}

test("[ABC[23]][89]", 0); // should be 8
test("[ABC[23]][89]", 4); // should be 7
test("[ABC[23]][89]", 9); // should be 12
test("[ABC[23]][89]", 1); // No matching bracket