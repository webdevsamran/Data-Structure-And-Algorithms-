<?php

function streamMed($arr, $n){
    $g = new SplMaxHeap;
    $s = new SplMaxHeap;
    for($i = 0; $i < $n; $i++){
        $s->insert($arr[$i]);
        $temp = $s->extract();
        $g->insert(-1 * $temp);
        if($g->count() > $s->count()){
            $temp = $g->extract();
            $s->insert(-1 * $temp);
        }
        if($g->count() != $s->count()){
            echo $s->top() . " ";
        }else{
            echo (float)(($s->top() - $g->top()) / 2) . " ";
        }
    }
}

$A = [ 5, 15, 1, 3, 2, 8, 7, 9, 10, 6, 11, 4 ];
$N = sizeof($A);
streamMed($A, $N);