<?php

function minimumflip($matrix,$size){
    $flip = 0;
    for($i = 0; $i < $size; $i++){
        for($j = 0; $j < $i; $j++){
            if($matrix[$i][$j] != $matrix[$j][$i]){
                $flip++;
            }
        }
    }
    return $flip;
}

$n = 3;
$mat = [
    [ 0, 0, 1 ],
    [ 1, 1, 1 ],
    [ 1, 0, 0 ]
];
echo minimumflip($mat, $n);