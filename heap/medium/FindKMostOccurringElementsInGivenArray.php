<?php

function compare($a,$b){
    if($a[1] == $b[1]){
        return $b[0] > $a[0];
    }
    return $b[1] > $a[1];
}

function print_N_mostFrequentNumber($arr,$N,$K){
    $mp = array();
    for($i = 0; $i < $N; $i++){
        if(!array_key_exists($arr[$i],$mp)){
            $mp[$arr[$i]] = 0;
        }
        $mp[$arr[$i]]++;
    }
    $temp = array();
    foreach($mp as $key => $freq){
        array_push($temp,[$key,$freq]);
    }
    usort($temp,'compare');
    $pq = new SplMaxHeap;
    for($i = 0; $i < sizeof($temp); $i++){
        $pq->insert([$temp[$i][1],$temp[$i][0]]);
    }
    for($i = 0; $i < $K; $i++){
        $item = $pq->extract();
        echo $item[1]." ";
    }
    return;
}

$arr = [ 3, 1, 4, 4, 5, 2, 6, 1 ];
$N = sizeof($arr);
$K = 2;

print_N_mostFrequentNumber($arr, $N, $K);