<?php

function printMaxActivities($s,$f,$n){
    $i = 0;
    echo $i . " ";
    for($j = 1; $j < $n; $j++){
        if($s[$j] >= $f[$i]){
            echo $j . " ";
            $i = $j;
        }
    }
}

$s = [ 1, 3, 0, 5, 8, 5 ];
$f = [ 2, 4, 6, 7, 9, 9 ];
$n = sizeof($s);
printMaxActivities($s, $f, $n);