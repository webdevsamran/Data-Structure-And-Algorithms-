<?php

define('k',16);
define('N',100005);
$table = array();

function buildSparseTable($arr,$n){
    global $table;
    for($i = 0; $i < $n; $i++){
        $table[$i][0] = $arr[$i];
    }
    for($j = 1; $j <= k; $j++){
        for($i = 0; $i <= ($n - (1 << $j)); $i++){
            $table[$i][$j] = $table[$i][$j - 1] + $table[$i + (1 << ($j - 1))][$j - 1];
        }
    }
    echo "<pre>";
    print_r($table);
}

function query($l, $r){
    global $table;
    $answer = 0;
    for($j = k; $j >= 0; $j--){
        if($l + (1 << $j) -1 <= $r){
            $answer += $table[$l][$j];
            $l += 1 << $j;
        }
    }
    return $answer;
}

$arr = [ 3, 7, 2, 5, 8, 9 ];
$n = sizeof($arr);

buildSparseTable($arr, $n);

echo query(0, 5) . "<br/>";
echo query(3, 5) . "<br/>";
echo query(2, 4) . "<br/>";