<?php

class PetrolPump{
    public $petrol;
    public $distance;
}

function printTour($p,$n){
    $start = 0;
    $deficit = 0;
    $capacity = 0;
    for($i = 0; $i < $n; $i++){
        $capacity += $p[$i][0] - $p[$i][1];
        if($capacity < 0){
            $start = $i + 1;
            $deficit += $capacity;
            $capacity = 0;
        }
    }
    return ($capacity + $deficit >= 0) ? $start : -1;
}

$arr = [ [ 6, 4 ], [ 3, 6 ], [ 7, 3 ] ];
$n = sizeof($arr);
$start = printTour($arr, $n);
echo ($start == -1) ? "No solution" :"Start = " . $start;