<?php

/* function FirstNonRepeating($a){
    $ans = '';
    $map = array();
    $queue = new SplQueue;
    $n = strlen($a);
    for($i = 0; $i < $n; $i++){
        if(!array_key_exists($a[$i],$map)){
            $queue->enqueue($a[$i]);
        }
        $map[$a[$i]]++;
        while(!$queue->isEmpty() && $map[$queue->top()] > 1){
            $queue->dequeue();
        }
        if(!$queue->isEmpty()){
            $ans .= $queue->top();
        }else{
            $ans .= '#';
        }
    }
    return $ans;
}

$A = "geeksforgeeksandgeeksquizfor";
$ans = FirstNonRepeating($A);
echo $ans; */

function FirstNonRepeating($a){
    $ans = '';
    $n = strlen($a);
    $map = array();
    for($i = 0; $i < $n; $i++){
        if(array_key_exists($a[$i],$map)){
            $ans .= '#';
        }else{
            $ans .= $a[$i];
            $map[$a[$i]]++;
        }
    }
    return $ans;
}

$A = "aabc";
echo FirstNonRepeating($A);