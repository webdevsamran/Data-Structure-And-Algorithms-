<?php

define('N',5);

function countZeroes($matrix){
    $row = N - 1;
    $col = 0;
    $count = 0;

    while($col < N){
        while($matrix[$row][$col]){
            --$row;
            if($row < 0){
                return $count;
            }
        }
        $count += ($row+1);
        $col++;
    }
    return $count;
}

$mat = [
    [ 0, 0, 0, 0, 1 ],
    [ 0, 0, 0, 1, 1 ],
    [ 0, 1, 1, 1, 1 ],
    [ 1, 1, 1, 1, 1 ],
    [ 1, 1, 1, 1, 1 ]
];
 
echo countZeroes($mat);