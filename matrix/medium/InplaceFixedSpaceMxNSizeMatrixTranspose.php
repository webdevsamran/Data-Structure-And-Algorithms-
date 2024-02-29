<?php

function Print2DArray($arr,$r,$c){
    for($i = 0; $i < $r; $i++){
        for($j = 0; $j < $c; $j++){
            $res = ($i * $c) + $j;
            echo " " . $arr[$res] . " ";
        }
        echo "<br/>";
    }
    echo "<br/>";
}

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function MatrixInplaceTranspose(&$arr,$r,$c){
    $size = ($r * $c) - 1;
    $t = NULL;
    $next = NULL;
    $cycleBegin = NULL;
    $i = NULL;
    $b = array();
    $b[0] = $b[$size] = 1;
    $i = 1;

    while($i < $size){
        $cycleBegin = $i;
        $t = $arr[$i];
        do{
            $next = ($i * $r) % $size;
            swap($arr[$next],$t);
            $b[$i] = 1;
            $i = $next;
        }while($i != $cycleBegin);
        for ($i = 1; $i < $size && $b[$i]; $i++)
            echo "<br/>";
    }
}

$r = 5;
$c = 6;
$size = $r*$c;
$A = array();

for($i = 0; $i < $size; $i++)
    $A[$i] = $i+1;

Print2DArray($A, $r, $c);
MatrixInplaceTranspose($A, $r, $c);
Print2DArray($A, $c, $r);