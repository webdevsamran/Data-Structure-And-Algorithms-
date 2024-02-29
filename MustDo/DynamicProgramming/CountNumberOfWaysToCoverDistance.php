<?php

function printCountDP($dist){
    $ways = array(1,1,2);
    $n = $dist;
    for($i = 3; $i <= $n; $i++){
        $ways[$i % 3] = $ways[($i-1)%3] + $ways[($i-2)%3] + $ways[($i-3)%3];
    }
    return $ways[$n % 3];
}

$dist = 4;
echo printCountDP($dist);