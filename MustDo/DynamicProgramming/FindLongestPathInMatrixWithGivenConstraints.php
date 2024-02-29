<?php

function findLongestFromACell($i, $j, $n, $mat, &$dp){
    if($i < 0 || $j < 0 || $i >= $n || $j >= $n){
        return 0;
    }
    if($dp[$i][$j] != -1){
        return $dp[$i][$j];
    }
    $x = $y = $z = $w = PHP_INT_MIN;
    if($j < $n - 1 && ($mat[$i][$j] + 1 == $mat[$i][$j + 1])){
        $x = 1 + findLongestFromACell($i, $j + 1, $n, $mat, $dp);
    }
    if($j > 0 && ($mat[$i][$j] + 1 == $mat[$i][$j - 1])){
        $y = 1 + findLongestFromACell($i, $j - 1, $n, $mat, $dp);
    }
    if($i > 0 && ($mat[$i][$j] + 1 == $mat[$i - 1][$j])){
        $w = 1 + findLongestFromACell($i - 1, $j, $n, $mat, $dp);
    }
    if($i < $n - 1 && ($mat[$i][$j] + 1 == $mat[$i + 1][$j])){
        $z = 1 + findLongestFromACell($i + 1, $j, $n, $mat, $dp);
    }
    return $dp[$i][$j] = max($x,$y,$z,$w,1);
}

function finLongestOverAll($mat){
    $result = 1;
    $n = sizeof($mat);
    $dp = array_fill(0,$n,array_fill(0,$n,-1));
    for($i = 0; $i < $n; $i++){
        for($j = 0; $j < $n; $j++){
            if($dp[$i][$j] == -1){
                findLongestFromACell($i, $j, $n, $mat, $dp);
            }
            $result = max($result,$dp[$i][$j]);
        }
    }
    return $result;
}

$mat = [
    [ 1, 2, 9 ],
    [ 5, 3, 8 ],
    [ 4, 6, 7 ]
];
echo "Length of the longest path is " . finLongestOverAll($mat);