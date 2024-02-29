<?php

define('MAX',100);

function dfs($n,$m,&$visited,$adj,$N,$M){
    $visited[$n][$m] = 1;
    if($n+1 < $N && $adj[$n][$m] >= $adj[$n+1][$m] && !$visited[$n+1][$m]){
        dfs($n+1,$m,$visited,$adj,$N,$M);
    }
    if($m+1 < $M && $adj[$n][$m] >= $adj[$n][$m+1] && !$visited[$n][$m+1]){
        dfs($n,$m+1,$visited,$adj,$N,$M);
    }
    if($n-1 >= 0 && $adj[$n][$m] >= $adj[$n-1][$m] && !$visited[$n-1][$m]){
        dfs($n-1,$m,$visited,$adj,$N,$M);
    }
    if($m-1 >= 0 && $adj[$n][$m] >= $adj[$n][$m-1] && !$visited[$n][$m-1]){
        dfs($n,$m-1,$visited,$adj,$N,$M);
    }
}

function printMinSources($adj,$N,$M){
    $x = array();
    for($i = 0; $i < $N; $i++){
        for($j = 0; $j < $M; $j++){
            array_push($x,[$adj[$i][$j],[$i,$j]]);
        }
    }
    sort($x);
    $visited = array_fill(0,$N,array_fill(0,MAX,0));
    for($i = sizeof($x)-1; $i >= 0; $i--){
        if(!$visited[$x[$i][1][0]][$x[$i][1][1]]){
            echo $x[$i][1][0] . " " . $x[$i][1][1] . "<br/>";
            dfs($x[$i][1][0],$x[$i][1][1],$visited,$adj,$N,$M);
        }
    }
}

$N = 2;
$M = 2; 
$adj = [
    [3, 3],
    [1, 1]
];
printMinSources($adj, $N, $M);