<?php

function secMostRepeated($seq){
    $occ = array();
    $n = sizeof($seq);
    for($i = 0; $i < $n; $i++){
        $occ[$seq[$i]]++;
    }
    $first_Max = $second_Max = PHP_INT_MIN;
    foreach($occ as $key => $freq){
        if($freq > $first_Max){
            $second_Max = $first_Max;
            $first_Max = $freq;
        }else if($freq > $second_Max && $freq != $first_Max){
            $second_Max = $freq;
        }
    }
    foreach($occ as $key => $freq){
        if($freq == $second_Max){
            return $key;
        }
    }
}

$seq = [ "ccc", "aaa", "ccc", "ddd", "aaa", "aaa" ];
echo secMostRepeated($seq);