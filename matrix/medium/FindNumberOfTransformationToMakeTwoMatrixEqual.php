<?php

function countOps($mat1,$mat2,$m,$n){
    for($i = 0; $i < $n; $i++){
        for($j = 0; $j < $m; $j++){
            $mat1[$i][$j] -= $mat2[$i][$j];
        }
    }
    for($i = 1; $i < $n; $i++){
        for($j = 1; $j < $m; $j++){
            if($mat1[$i][$j] - $mat1[$i][0] - $mat1[0][$j] + $mat1[0][0] != 0){
                return -1;
            }
        }
    }
    $result = 0;
    for($i = 0; $i < $n; $i++){
        $result += abs($mat1[$i][0]);
    }
    for($j = 0; $j < $m; $j++){
        $result += abs($mat1[0][$j] - $mat1[0][0]);
    }
    return $result;
}

$A = [ 
    [1, 1, 1],
    [1, 1, 1],
    [1, 1, 1]
];
$B = [ 
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
echo countOps($A, $B, 3, 3);