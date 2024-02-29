<?php

function max_cost($n,$edges,$src,$dst,$k){
    $temp = array_fill(0,$n,PHP_INT_MAX);
    $temp[$src] = 0;
    for($i = 0; $i <=$k; $i++){
        $c = $temp;
        foreach($edges as $edge){
            $a = $edge[0];
            $b = $edge[1];
            $w = $edge[2];
            $temp[$b] = min($temp[$b],($c[$a] == PHP_INT_MAX) ? PHP_INT_MAX : $c[$a] - $w);
        }
    }
    if($temp[$dst] != PHP_INT_MAX){
        return -$temp[$dst];
    }
    return -1;
}

$edges = [
    [ 0, 1, 100 ],
    [ 1, 2, 100 ],
    [ 0, 2, 500 ],
];
$src = 0;
$dst = 2;
$k = 1;
$n = 3;

echo max_cost($n, $edges, $src, $dst, $k);