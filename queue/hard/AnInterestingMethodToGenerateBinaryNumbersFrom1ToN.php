<?php

function generatePrintBinary($n){
    $queue = new SplQueue;
    $queue->enqueue('1');
    while($n--){
        $s1 = $queue->dequeue();
        echo $s1 . " ";
        $s2 = $s1;
        $queue->enqueue($s1.'0');
        $queue->enqueue($s2.'1');
    }
}

$n = 10;
generatePrintBinary($n);