<?php

function streamMed($A,$N){
    $s = new SplMaxHeap;
    $g = new SplMaxHeap;

    for($i = 0; $i < $N; $i++){
        $s->insert($A[$i]);
        $temp = $s->extract();
        $g->insert((int)(-1*$temp));
        if($g->count() > $s->count()){
            $temp = $g->extract();
            $s->insert((int)(-1*$temp));
        }
        if($g->count() != $s->count()){
            echo $s->top() . "<br/>";
        }else{
            echo (($s->top()-$g->top())/2) . "<br/>";
        }
    }
}

$A = [ 5, 15, 1, 3, 2, 8, 7, 9, 10, 6, 11, 4 ];
$N = sizeof($A);

streamMed($A, $N);