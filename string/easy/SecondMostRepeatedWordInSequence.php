<?php

function secMostRepeated($seq){
    $occ = array();
    for($i = 0; $i < sizeof($seq); $i++){
        if(!array_key_exists($seq[$i],$occ)){
            $occ[$seq[$i]] = 0;
        }
        $occ[$seq[$i]]++;
    }

    $first_max = PHP_INT_MIN;
    $second_max = PHP_INT_MIN;
    foreach($occ as $el => $count){
        if($count > $first_max){
            $second_max = $first_max;
            $first_max = $count;
        }else if($count > $second_max && $count != $first_max){
            $second_max = $count;
        }
    }

    $second_max_el = NULL;
    foreach($occ as $el => $count){
        if($count == $second_max){
            $second_max_el = $el;
        }
    }

    return $second_max_el;
}

$seq = [ "ccc", "aaa", "ccc", "ddd", "aaa", "aaa" ];
echo secMostRepeated($seq);