<?php

define('SIZE',6);

function floodFillUtil(&$mat,$x,$y,$old,$new){
    if($x < 0 || $y < 0 || $x >= SIZE || $y >= SIZE){
        return;
    }
    if($mat[$x][$y] != $old){
        return;
    }
    $mat[$x][$y] = $new;
    floodFillUtil($mat, $x+1, $y, $old, $new);
    floodFillUtil($mat, $x-1, $y, $old, $new);
    floodFillUtil($mat, $x, $y+1, $old, $new);
    floodFillUtil($mat, $x, $y-1, $old, $new);
}

function replaceSurrounded(&$mat){
    for($i = 0; $i < SIZE; $i++){
        for($j = 0; $j < SIZE; $j++){
            if($mat[$i][$j] == 'O'){
                $mat[$i][$j] = '-';
            }
        }
    }
    for($i = 0; $i < SIZE; $i++){
        if($mat[$i][0] == '-'){
            floodFillUtil($mat, $i, 0, '-', 'O');
        }
    }
    for($i = 0; $i < SIZE; $i++){
        if($mat[$i][SIZE-1] == '-'){
            floodFillUtil($mat, $i, SIZE-1, '-', 'O');
        }
    }
    for($i = 0; $i < SIZE; $i++){
        if($mat[0][$i] == '-'){
            floodFillUtil($mat, 0, $i, '-', 'O');
        }
    }
    for($i = 0; $i < SIZE; $i++){
        if($mat[SIZE-1][$i] == '-'){
            floodFillUtil($mat, SIZE-1, $i, '-', 'O');
        }
    }
    for($i = 0; $i < SIZE; $i++){
        for($j = 0; $j < SIZE; $j++){
            if($mat[$i][$j] == '-'){
                $mat[$i][$j] = 'X';
            }
        }
    }
}

$mat =  [
    ['X', 'O', 'X', 'O', 'X', 'X'],
    ['X', 'O', 'X', 'X', 'O', 'X'],
    ['X', 'X', 'X', 'O', 'X', 'X'],
    ['O', 'X', 'X', 'X', 'X', 'X'],
    ['X', 'X', 'X', 'O', 'X', 'O'],
    ['O', 'O', 'X', 'O', 'O', 'O'],
];
replaceSurrounded($mat);
for ($i = 0;  $i < SIZE; $i++)
{
    for ($j = 0;  $j < SIZE; $j++)
        echo $mat[$i][$j] . " ";
    echo "<br/>";
}