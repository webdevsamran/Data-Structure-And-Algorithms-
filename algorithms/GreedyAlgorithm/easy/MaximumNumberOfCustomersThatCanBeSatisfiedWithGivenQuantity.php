<?php

function solve($n,$d,$a,$b,$arr){
    $v = array();
    for($i = 0; $i < $n; $i++){
        $m = $arr[$i][0];
        $t = $arr[$i][1];
        array_push($v,[$a*$m+$b*$t,$i+1]);
    }

    sort($v);
    $ans = array();
    for($i = 0; $i < $n; $i++){
        if($v[$i][0] <= $d){
            array_push($ans,$v[$i][1]);
            $d -= $v[$i][0];
        }
    }
    echo sizeof($ans) . "<br/>";
    for($i = 0; $i < sizeof($ans); $i++){
        echo $ans[$i] . " ";
    }
}

$n = 5;
$d = 5;
$a = 1;
$b = 1;
$arr = [
    [2, 0],
    [3, 2],
    [4, 4],
    [10, 0],
    [0, 1]
];
    
solve($n, $d, $a, $b, $arr);