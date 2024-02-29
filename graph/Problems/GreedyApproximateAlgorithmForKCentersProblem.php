<?php

function maxindex($dist,$n){
    $mi = 0;
    for($i = 0; $i < $n; $i++){
        if($dist[$i] > $dist[$mi]){
            $mi = $i;
        }
    }
    return $mi;
}

function selectKcities($n,$weights,$k){
    $dist = array_fill(0,$n,PHP_INT_MAX);
    $centers = array();
    $max = 0;

    for($i = 0; $i < $k; $i++){
        array_push($centers,$max);
        for($j = 0; $j < $n; $j++){
            $dist[$j] = min($dist[$j],$weights[$max][$j]);
        }
        $max = maxindex($dist,$n);
    }

    echo $dist[$max] . "<br/>";
    for($i = 0; $i < sizeof($centers); $i++){
        echo $centers[$i] . " ";
    }
    echo "<br/>";
}

$n = 4;
$weights = [ 
    [ 0, 4, 8, 5 ],
    [ 4, 0, 10, 7 ],
    [ 8, 10, 0, 9 ],
    [ 5, 7, 9, 0 ] 
];
$k = 2;

selectKcities($n, $weights, $k);