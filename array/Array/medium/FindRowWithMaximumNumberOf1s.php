<?php

define('SIZE',4);

function rowWithMax1s($mat){
    $max_row_index = 0;
    $j = SIZE - 1;
    for($i = 0; $i < SIZE; $i++){
        $flag = false;
        while($j >= 0 && $mat[$i][$j] == 1){
            $j--;
            $flag = true;
        }
        if($flag){
            $max_row_index = $i;
        }
    }
    if($max_row_index == 0 && $mat[0][SIZE - 1] == 0){
        return -1;
    }
    return $max_row_index;
}

$mat = [ 
    [0, 0, 0, 1],
    [0, 1, 1, 1],
    [1, 1, 1, 1],
    [0, 0, 0, 0]
];
echo "Index of row with maximum 1s is " . rowWithMax1s($mat);