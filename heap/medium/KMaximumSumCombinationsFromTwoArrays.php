<?php

function KMaxCombinations($A,$B,$K){
    $maxHeap = new SplMaxHeap;
    $N = sizeof($A);

    for($i = 0; $i < $N; $i++){
        for($j = 0; $j < $N; $j++){
            $maxHeap->insert($A[$i]+$B[$j]);
        }
    }

    while($K){
        echo $maxHeap->extract()." ";
        $K--;
    }
}

$A = [ 1, 4, 2, 3 ];
$B = [ 2, 5, 1, 6 ];
$K = 4;

KMaxCombinations($A, $B, $K);