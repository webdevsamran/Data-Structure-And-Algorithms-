<?php

define('R',3);
define('C',4);

function modifyMatrix(&$mat){
    $row = array_fill(0,R,0);
    $col = array_fill(0,C,0);

    for($i = 0; $i < R; $i++){
        for($j = 0; $j < C; $j++){
            if($mat[$i][$j] == 1){
                $row[$i] = 1;
                $col[$j] = 1;
            }
        }
    }

    for($i = 0; $i < R; $i++){
        for($j = 0; $j < C; $j++){
            if($row[$i] == 1 || $col[$j] == 1){
                $mat[$i][$j] = 1;
            }
        }
    }
}

function printMatrix($m){
    for($i = 0; $i < R; $i++){
        for($j = 0; $j < C; $j++){
            echo $m[$i][$j] . " ";
        }
        echo "<br/>";
    }
}

$mat = [ 
    [ 1, 0, 0, 1 ],
    [ 0, 0, 1, 0 ],
    [ 0, 0, 0, 0 ]
];
 
echo "Input Matrix <br/>";
printMatrix($mat);
modifyMatrix($mat);
printf("Matrix after modification <br/>");
printMatrix($mat);