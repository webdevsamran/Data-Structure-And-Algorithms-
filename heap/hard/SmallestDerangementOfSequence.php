<?php

function generate_derangement($n){
    $S = array();
    for($i = 1; $i <= $n; $i++){
        $S[] = $i;
    }
    $D = array();
    for($i = 1; $i <= $n; $i += 2){
        if($i == $n && $i % $n != 0){
            $temp = $D[$n];
            $D[$n] = $D[$n-1];
            $D[$n-1] = $temp;
        }else{
            $D[$i] = $i + 1;
            $D[$i + 1] = $i;
        }
    }
    print_r($D);
}

generate_derangement(10);