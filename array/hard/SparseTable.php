<?php

define('MAX',500);
$table = array();

function buildSparseTable($a){
    global $table;
    $n = sizeof($a);
    for($i = 0; $i < $n; $i++){
        $table[$i][0] = $a[$i];
    }
    for($j = 1; $j <= log($n,2); $j++){
        for($i = 0; $i <= ($n - (1 << $j)); $i++){
            $table[$i][$j] = gmp_intval(gmp_gcd($table[$i][$j-1],$table[$i+(1<<($j-1))][$j-1]));
        }
    }
    echo "<pre>";
    print_r($table);
}

function query($l,$r){
    global $table;
    $j = (int)log(($r-$l+1),2);
    return gmp_intval(gmp_gcd($table[$l][$j],$table[$r-(1<<$j)+1][$j]));
}

$a = [ 7, 2, 3, 0, 5, 10, 3, 12, 18 ];
$n = sizeof($a);
buildSparseTable($a, $n);
echo query(0, 2) . "<br/>";
echo query(1, 3) . "<br/>";
echo query(4, 5) . "<br/>";