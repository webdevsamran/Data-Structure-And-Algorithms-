<?php

define('N',8);

function isSafe(&$board,$row,$col){
    for($x = 0; $x < $col; $x++){
        if($board[$row][$x] == 1){
            return false;
        }
    }
    for($x = $row,$y = $col; $x >= 0 && $y >= 0; $x--,$y--){
        if($board[$x][$y] == 1){
            return false;
        }
    }
    for($x = $row,$y = $col; $x < N && $y >= 0; $x++,$y--){
        if($board[$x][$y] == 1){
            return false;
        }
    }
    return true;
}

function solveNQueens(&$board,$col){
    if($col == N){
        for($i = 0; $i < N; $i++){
            for($j = 0; $j < N; $j++){
                echo $board[$i][$j] . " ";
            }
            echo "<br/>";
        }
        echo "<br/>";
        return true;
    }
    for($i = 0; $i < N; $i++){
        if(isSafe($board,$i,$col)){
            $board[$i][$col] = 1;
            if(solveNQueens($board,$col+1)){
                return true;
            }
            $board[$i][$col] = 0;
        }
    }
    return false;
}

$board = array_fill(0,N,array_fill(0,N,0));
if (!solveNQueens($board, 0))
    echo "No solution found";