<?php

$result = array();

function isSafe($board,$row,$col){
    $n = sizeof($board);
    for($i = 0; $i < $col; $i++){
        if($board[$row][$i]){
            return false;
        }
    }
    for($i = $row,$j = $col; $i >= 0 && $j >= 0; $i--,$j--){
        if($board[$i][$j]){
            return false;
        }
    }
    for($i = $row,$j = $col; $i < $n && $j >= 0; $i++,$j--){
        if($board[$i][$j]){
            return false;
        }
    }
    return true;
}

function solveNQUtil(&$board,$col){
    global $result;
    $n = sizeof($board);
    if($col == $n){
        $v = array();
        for($i = 0; $i < $n; $i++){
            for($j = 0; $j < $n; $j++){
                if($board[$i][$j] == 1){
                    array_push($v,$j+1);
                }
            }
        }
        array_push($result,$v);
        return true;
    }
    $res = false;
    for($i = 0; $i < $n; $i++){
        if(isSafe($board,$i,$col)){
            $board[$i][$col] = 1;
            $res = solveNQUtil($board,$col+1) || $res;
            $board[$i][$col] = 0;
        }
    }
    return $res;
}

function nQueen($n){
    global $result;
    $result = array();
    $board = array_fill(0,$n,array_fill(0,$n,0));

    if(solveNQUtil($board,0) == false){
        return array();
    }

    return $result;
}

$n = 4;
$v = nQueen($n);
echo "<pre>";
print_r($v);