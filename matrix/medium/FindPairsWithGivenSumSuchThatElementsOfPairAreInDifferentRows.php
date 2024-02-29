<?php

function pairSum($matrix,$size,$sum){
    $mp = array();
    for($i = 0; $i < $size; $i++){
        for($j = 0; $j < $size; $j++){
            $rem_sum = $sum - $matrix[$i][$j];
            if(array_key_exists($rem_sum,$mp)){
                $rowNum = $mp[$rem_sum];
                if($rowNum != $i){
                    echo "(" . $rem_sum . " , " . $matrix[$i][$j] ." ) ";
                }
            }
            $mp[$matrix[$i][$j]] = $i;
        }
    }

    echo "<pre/>";
    print_r($mp);
}

$n = 4;
$sum = 11;
$mat = [
    [1, 3, 2, 4],
    [5, 8, 7, 6],
    [9, 10, 13, 11],
    [12, 0, 14, 15]
];
pairSum($mat, $n, $sum);