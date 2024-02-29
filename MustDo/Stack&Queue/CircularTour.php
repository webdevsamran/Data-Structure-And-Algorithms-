<?php

function tour($n, $petrol, $distance){
    $n = sizeof($petrol);
    $arr = array();
    for($i = 0; $i < $n; $i++){
        array_push($arr,[$petrol[$i],$distance[$i]]);
    }
    $start = $deficit = $capacity = 0;
    for($i = 0; $i < $n; $i++){
        $capacity += $arr[$i][0] - $arr[$i][1];
        if($capacity < 0){
            $start = $i + 1;
            $deficit += $capacity;
            $capacity = 0;
        }
    }
    return ($capacity + $deficit >= 0) ? $start : -1;
}

$n = 4;
$petrol = [4, 6, 7, 4];
$distance = [6, 5, 3, 5];

echo tour($n,$petrol,$distance);