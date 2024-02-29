<?php

define('size',4);

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function reverse(&$arr){
    for($i = 0; $i < size; $i++){
        for($j = 0,$k= size-1; $j < $k; $j++,$k--){
            swap($arr[$j][$i],$arr[$k][$i]);
        }
    }
}

function transpose(&$arr){
    for($i = 0; $i < size; $i++){
        for($j = $i; $j < size; $j++){
            swap($arr[$i][$j],$arr[$j][$i]);
        }
    }
}

function rotate90(&$arr){
    transpose($arr);
    reverse($arr);
}

function printMatrix($arr){
    for($i = 0; $i < size; $i++){
        for($j = 0; $j < size; $j++){
            echo $arr[$i][$j]." ";
        }
        echo "<br/>";
    }
}

$arr = [ 
    [ 1, 2, 3, 4 ],
    [ 5, 6, 7, 8 ],
    [ 9, 10, 11, 12 ],
    [ 13, 14, 15, 16 ] 
];
rotate90($arr);
printMatrix($arr);