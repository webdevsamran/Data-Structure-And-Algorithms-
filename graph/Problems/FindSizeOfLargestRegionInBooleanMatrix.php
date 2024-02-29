<?php

define('ROW',4);
define('COL',5);

function isSafe($M,$i,$j,$visited){
    return ($i >= 0 && $j >= 0 && $i < ROW && $j < COL && $M[$i][$j] && !$visited[$i][$j]);
}

function DFS($M,$i,$j,&$visited,&$count){
    $rowNbr = [ -1, -1, -1, 0, 0, 1, 1, 1 ];
    $colNbr = [ -1, 0, 1, -1, 1, -1, 0, 1 ];
    $visited[$i][$j] = 1;
    for($k = 0; $k < 8; $k++){
        if(isSafe($M,$i+$rowNbr[$k],$j+$colNbr[$k],$visited)){
            $count++;
            DFS($M,$i+$rowNbr[$k],$j+$colNbr[$k],$visited,$count);
        }
    }
}

function largestRegion($matrix){
    $visited = array_fill(0,ROW,array_fill(0,COL,0));
    $result = PHP_INT_MIN;
    for($i = 0; $i < ROW; $i++){
        for($j = 0; $j < COL; $j++){
            if($matrix[$i][$j] && !$visited[$i][$j]){
                $count = 1;
                DFS($matrix,$i,$j,$visited,$count);
                $result = max($result,$count);
            }
        }
    }
    return $result;
}

$M = [ 
    [ 0, 0, 1, 1, 0 ],
    [ 1, 0, 1, 1, 0 ],
    [ 0, 1, 0, 0, 0 ],
    [ 0, 0, 0, 0, 1 ] 
];
 
echo largestRegion($M);