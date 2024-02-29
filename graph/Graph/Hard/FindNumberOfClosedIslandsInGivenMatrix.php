<?php

function dfs(&$matrix,&$visited,$x,$y,$n,$m,&$hasCornerCells){
    if($x < 0 || $y < 0 || $x >= $n || $y >= $m || $visited[$x][$y] || !$matrix[$x][$y]){
        return;
    }
    if($x == 0 || $y == 0 || $x == $n-1 || $y == $m-1){
        $hasCornerCells = true;
    }
    $visited[$x][$y] = 1;
    dfs($matrix,$visited,$x+1,$y,$n,$m,$hasCornerCells);
    dfs($matrix,$visited,$x,$y+1,$n,$m,$hasCornerCells);
    dfs($matrix,$visited,$x-1,$y,$n,$m,$hasCornerCells);
    dfs($matrix,$visited,$x,$y-1,$n,$m,$hasCornerCells);
}

function countClosedIsland($matrix,$n,$m){
    $visited = array_fill(0,$n,array_fill(0,$m,0));
    $result = 0;
    for($i = 0; $i < $n; $i++){
        for($j = 0; $j < $m; $j++){
            if($i != 0 && $j != 0 && $i != $n - 1 && $j != $m - 1 && $matrix[$i][$j] == 1 && !$visited[$i][$j]){
                $hasCornerCells = false;
                dfs($matrix,$visited,$i,$j,$n,$m,$hasCornerCells);
                if(!$hasCornerCells){
                    $result = $result + 1;
                }
            }
        }
    }
    return $result;
}

$N = 5;
$M = 8;
$matrix = [ 
    [ 0, 0, 0, 0, 0, 0, 0, 1 ],
    [ 0, 1, 1, 1, 1, 0, 0, 1 ],
    [ 0, 1, 0, 1, 0, 0, 0, 1 ],
    [ 0, 1, 1, 1, 1, 0, 1, 0 ],
    [ 0, 0, 0, 0, 0, 0, 0, 1 ] 
];

echo countClosedIsland($matrix, $N, $M);