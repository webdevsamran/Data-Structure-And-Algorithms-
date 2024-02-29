<?php

function DFS(&$M,$i,$j,$row,$col){
    if($i < 0 || $j < 0 || $i >= $row || $j >= $col || $M[$i][$j] != 1){
        return;
    }
    if($M[$i][$j] == 1){
        $M[$i][$j] = 0;
        DFS($M,$i+1,$j,$row,$col);
        DFS($M,$i-1,$j,$row,$col);
        DFS($M,$i,$j+1,$row,$col);
        DFS($M,$i,$j-1,$row,$col);
        DFS($M,$i+1,$j+1,$row,$col);
        DFS($M,$i-1,$j-1,$row,$col);
        DFS($M,$i+1,$j-1,$row,$col);
        DFS($M,$i-1,$j+1,$row,$col);
    }
}

function countIslands($M){
    $row = sizeof($M);
    $col = sizeof($M[0]);
    $count = 0;
    for($i = 0; $i < $row; $i++){
        for($j = 0; $j < $col; $j++){
            if($M[$i][$j] == 1){
                $count++;
                DFS($M,$i,$j,$row,$col);
            }
        }
    }
    return $count;
}

$M = [
    [ 1, 1, 0, 0, 0 ],
    [ 0, 1, 0, 0, 1 ],
    [ 1, 0, 0, 1, 1 ],
    [ 0, 0, 0, 0, 0 ],
    [ 1, 0, 1, 0, 1 ]
];
echo "Number of islands is: " . countIslands($M);