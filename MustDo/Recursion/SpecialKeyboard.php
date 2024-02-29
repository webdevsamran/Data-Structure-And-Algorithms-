<?php

function findoptimal($N){
    if($N <= 6){
        return $N;
    }
    $screen = array();
    for($n = 1; $n <= 6; $n++){
        $screen[$n-1] = $n;
    }
    for($n = 7; $n <= $N; $n++){
        $screen[$n-1] = max(2 * $screen[$n - 4], 3 * $screen[$n - 5], 4 * $screen[$n - 6]);
    }
    return $screen[$N-1];
}

for ($N = 1; $N <= 20; $N++)
    printf("Maximum Number of A's with %d keystrokes is %d<br/>", $N, findoptimal($N));