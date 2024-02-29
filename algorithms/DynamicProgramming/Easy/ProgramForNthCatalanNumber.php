<?php

function catalanDP($n){
    $catalan = array();
    $catalan[0] = 1;
    $catalan[1] = 1;
    for($i = 2; $i <= $n; $i++){
        $catalan[$i] = 0;
        for($j = 0; $j < $i; $j++){
            $catalan[$i] += ($catalan[$j] * $catalan[$i - $j - 1]);
        }
    }
    return $catalan[$n];
}
for ($i = 0; $i < 10; $i++)
    echo catalanDP($i) . " ";