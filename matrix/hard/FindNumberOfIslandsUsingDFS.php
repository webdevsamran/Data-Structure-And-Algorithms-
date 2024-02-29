<?php

function DFS(&$M,$r,$c,$row,$col){
    if($r < 0 || $c < 0 || $r > $row - 1 || $c > $col - 1 || $M[$r][$c] != 1){
        return;
    }
    if($M[$r][$c] == 1){
        $M[$r][$c] = 0;
        DFS($M, $r + 1, $c, $row, $col); // right side traversal
        DFS($M, $r - 1, $c, $row, $col); // left side traversal
        DFS($M, $r, $c + 1, $row, $col); // upward side traversal
        DFS($M, $r, $c - 1, $row, $col); // downward side traversal
        DFS($M, $r + 1, $c + 1, $row, $col); // upward-right side traversal
        DFS($M, $r - 1, $c - 1, $row, $col); // downward-left side traversal
        DFS($M, $r + 1, $c - 1, $row, $col); // downward-right side traversal
        DFS($M, $r - 1, $c + 1, $row, $col); // upward-left side traversal
    }
}

function countIslands($M){
    $row = sizeof($M);
    $col = sizeof($M[0]);
    $count = 0;
    for($r = 0; $r < $row; $r++){
        for($c = 0; $c < $col; $c++){
            if($M[$r][$c] == 1){
                $count++;
                DFS($M,$r,$c,$row,$col);
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