<?php

function findoptimal($n){
    if($n <= 6){
        return $n;
    }
    $screen = array();
    $N = NULL;
    for($N = 1; $N <= 6; $N++){
        $screen[$N-1] = $N;
    }
    for($N = 7; $N <= $n; $N++){
        $screen[$N-1] = max(2 * $screen[$N-4], max(3 * $screen[$N-5],4 * $screen[$N-6]));
    }
    return $screen[$n-1];
}

for($n = 1; $n <= 20; $n++)
    printf("Maximum Number of A's with %d keystrokes is %d<br/>", $n, findoptimal($n));