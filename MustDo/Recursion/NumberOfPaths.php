<?php

function numberOfPaths($m, $n){
    $path = 1;
    for($i = $n; $i < ($n - 1 + $m); $i++){
        $path *= $i;
        $path /= ($i - $n + 1);
    }
    return $path;
}

echo numberOfPaths(3, 3);