<?php

define('size',6);

function findSubSquare($mat){
    $max = 0;
    $hor = array();
    $ver = array();
    $hor[0][0] = 'X';
    $ver[0][0] = 'X';

    for($i = 0; $i < size; $i++){
        for($j = 0; $j < size; $j++){
            if($mat[$i][$j] == 'O'){
                $hor[$i][$j] = 0;
                $ver[$i][$j] = 0;
            }else{
                $hor[$i][$j] = ($j == 0) ? 1 : $hor[$i][$j - 1] + 1;
                $ver[$i][$j] = ($i == 0) ? 1 : $ver[$i - 1][$j] + 1;
            }
        }
    }

    for($i = size - 1; $i >= 1; $i--){
        for($j = size - 1; $j >= 1; $j--){
            $small = min($hor[$i][$j],$ver[$i][$j]);
            while($small > $max){
                if($ver[$i][$j-$small+1] >= $small && $hor[$i - $small + 1][$j] >= $small){
                    $max = $small;
                }
                $small--;
            }
        }
    }
    return $max;
}

$mat = [
    [ 'X', 'O', 'X', 'X', 'X', 'X' ],
    [ 'X', 'O', 'X', 'X', 'O', 'X' ],
    [ 'X', 'X', 'X', 'O', 'O', 'X' ],
    [ 'O', 'X', 'X', 'X', 'X', 'X' ],
    [ 'X', 'X', 'X', 'O', 'X', 'O' ],
    [ 'O', 'O', 'X', 'O', 'O', 'O' ],
];

echo findSubSquare($mat);