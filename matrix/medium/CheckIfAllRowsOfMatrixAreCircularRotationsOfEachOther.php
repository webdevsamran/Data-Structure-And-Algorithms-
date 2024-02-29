<?php

function isPermutedMatrix($mat,$size){
    $str_cat = "";
    for($i = 0; $i < $size; $i++){
        $str_cat = $str_cat . "-" . $mat[0][$i];
    }
    $str_cat = $str_cat.$str_cat;
    for($i = 1; $i < $size; $i++){
        $cur_str = "";
        for($j = 0; $j < $size; $j++){
            $cur_str = $cur_str . "-" . $mat[$i][$j];
        }
        if(!str_contains($str_cat,$cur_str)){
            return false;
        }
    }
    return true;
}

$size = 4;
$mat = [
    [1, 2, 3, 4],
    [4, 1, 2, 3],
    [3, 4, 1, 2],
    [2, 3, 4, 1]
];
echo isPermutedMatrix($mat, $size)? "Yes" : "No";