<?php

function printMedians($arr,$n){
    $s = new SplMaxHeap;
    $g = new SplMinHeap;
    $med = $arr[0];
    $s->insert($med);

    echo $med . "<br/>";

    for($i = 1; $i < $n; $i++){
        $x = $arr[$i];
        if($s->count() > $g->count()){
            if($x < $med){
                $g->insert($s->extract());
                $s->insert($x);
            }else{
                $g->insert($x);
            }
            $med = (int)(($s->top()+$g->top())/2);
        }else if($s->count() == $g->count()){
            if($x < $med){
                $s->insert($x);
                $med = (int)($s->top());
            }else{
                $g->insert($x);
                $med = (int)($g->top());
            }
        }else{
            if($x < $med){
                $s->insert($g->extract());
                $g->insert($x);
            }else{
                $s->insert($x);
            }
            $med = (int)(($s->top()+$g->top())/2);
        }
        echo $med . "<br/>";
    }
}

$arr = [5, 15, 10, 20, 3];
$n = sizeof($arr);
printMedians($arr, $n);