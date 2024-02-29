<?php

define('R',4);
define('C',4);

function spiralPrint($row,$col,$arr){
    $c = $r = 0;
    while($r < $row && $c < $col){
        for($i = $c; $i < $col; $i++){
            echo $arr[$r][$i] . " ";
        }
        $r++;
        for($i = $r; $i < $row; $i++){
            echo $arr[$i][$col-1] . " ";
        }
        $col--;
        if($c < $col){
            for($i = $col-1; $i >= $c; $i--){
                echo $arr[$row-1][$i] . " ";
            }
            $row--;
        }
        if($r < $row){
            for($i = $row-1; $i >= $r; $i--){
                echo $arr[$i][$c] . " ";
            }
            $c++;
        }
    }
}

$a = [ 
    [ 1, 2, 3, 4 ],
    [ 5, 6, 7, 8 ],
    [ 9, 10, 11, 12 ],
    [ 13, 14, 15, 16 ]
];

spiralPrint(R, C, $a);