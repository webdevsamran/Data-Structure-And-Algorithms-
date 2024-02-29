<?php

define('SIZE',5);

function isSafe($m,$x,$y,$visited){
    return ($x >= 0 && $y >= 0 && $x < SIZE && $y < SIZE && $m[$x][$y] && !$visited[$x][$y]);
}

function DFS($m,$x,$y,&$visited){
    $rowNbr = [ -1, -1, -1, 0, 0, 1, 1, 1 ];
    $colNbr = [ -1, 0, 1, -1, 1, -1, 0, 1 ];
    $visited[$x][$y] = 1;
    for($k = 0; $k < 8; $k++){
        if(isSafe($m,$x+$rowNbr[$k],$y+$colNbr[$k],$visited)){
            DFS($m,$x+$rowNbr[$k],$y+$colNbr[$k],$visited);
        }
    }
}

function countIslands($m){
    $visited = array_fill(0,SIZE,array_fill(0,SIZE,0));
    $count = 0;
    for($i = 0; $i < SIZE; $i++){
        for($j = 0; $j < SIZE; $j++){
            if($m[$i][$j] && !$visited[$i][$j]){
                DFS($m,$i,$j,$visited);
                ++$count;
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