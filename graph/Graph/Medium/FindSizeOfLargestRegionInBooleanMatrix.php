<?php

define('ROW',4);
define('COL',5);

function isSafe($m,$row,$col,$visited){
    return ($row >= 0 && $row < ROW) && ($col >= 0 && $col < COL) && ($m[$row][$col] && !$visited[$row][$col]);
}

function DFS($m,$i,$j,&$visited,&$count){
    $rowNbr = [ -1, -1, -1, 0, 0, 1, 1, 1 ];
    $colNbr = [ -1, 0, 1, -1, 1, -1, 0, 1 ];
    $visited[$i][$j] = true;
    for($k = 0; $k < 8; $k++){
        $row = $i + $rowNbr[$k];
        $col = $j + $colNbr[$k];
        if(isSafe($m,$row,$col,$visited)){
            $count++;
            DFS($m,$row,$col,$visited,$count);
        }
    }
}

function largestRegion($m){
    $visited = array_fill(0,ROW,array_fill(0,COL,0));
    $result = PHP_INT_MIN;
    for($i = 0; $i < ROW; $i++){
        for($j = 0; $j < COL; $j++){
            if($m[$i][$j] && !$visited[$i][$j]){
                $count = 1;
                DFS($m,$i,$j,$visited,$count);
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