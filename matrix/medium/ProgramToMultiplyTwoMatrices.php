<?php

define('size',2);

function mulMat($mat1,$mat2){
    $result = array();
    echo "Multiplication of Two Matrices are: <br/>";
    for($i = 0; $i < size; $i++){
        for($j = 0; $j < size; $j++){
            $result[$i][$j] = 0;
            for($k = 0; $k < size; $k++){
                $result[$i][$j] += $mat1[$i][$k] * $mat2[$k][$j];
            }
            echo $result[$i][$j]." ";
        }
        echo "<br/>";
    }
}

$mat1 = [ [ 1, 1 ], [ 2, 2 ] ];
$mat2 = [ [ 1, 1 ], [ 2, 2 ] ];
  
// Function call
mulMat($mat1, $mat2);