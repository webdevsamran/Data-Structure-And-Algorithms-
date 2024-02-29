<?php

function FirstNonRepeating($str){
    $ans = '';
    $map = array();
    $queue = new SplQueue;
    $len = strlen($str);

    for($i = 0; $i < $len; $i++){
        if(!array_key_exists($str[$i],$map)){
            $queue->enqueue($str[$i]);
            $map[$str[$i]] = 0;
        }
        $map[$str[$i]]++;
        while(!$queue->isEmpty() && $map[$queue->bottom()] > 1){
            $queue->dequeue();
        }
        if(!$queue->isEmpty()){
            $ans .= $queue->bottom();
        }else{
            $ans .= '#';
        }
    }
    return $ans;
}

$A = "geeksforgeeksandgeeksquizfor";
$ans = FirstNonRepeating($A);
echo $ans . "<br/>";