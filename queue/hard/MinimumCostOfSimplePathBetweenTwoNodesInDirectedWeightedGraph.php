<?php

define('V',5);

function minimumCostSimplePath($s,$t,&$visited,$graph){
    if($s == $t){
        return 0;
    }
    $visited[$s] = 1;
    $ans = PHP_INT_MAX;
    for($i = 0; $i < V; $i++){
        if($graph[$s][$i] != PHP_INT_MAX && !$visited[$i]){
            $curr = minimumCostSimplePath($i,$t,$visited,$graph);
            if($curr < PHP_INT_MAX){
                $ans = min($ans, $graph[$s][$i] + $curr);
            }
        }
    }
    $visited[$s] = 0;
    return $ans;
}

$graph = array();
for ($i = 0; $i < V; $i++) {
    for ($j = 0; $j < V; $j++) {
        $graph[$i][$j] = PHP_INT_MAX;
    }
}

$visited = array_fill(0,V,0);
$graph[0][1] = -1;
$graph[0][3] = 1;
$graph[1][2] = -2;
$graph[2][0] = -3;
$graph[3][2] = -1;
$graph[4][3] = 2;
$s = 0;
$t = 2;
$visited[$s] = 1;
echo minimumCostSimplePath($s, $t, $visited, $graph);