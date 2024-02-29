<?php

function countManipulations($s1,$s2){
    $count = 0;
    $char_count = array();
    for($i = 0; $i < strlen($s1); $i++){
        $char_count[$s1[$i]]++;
    }
    for($i = 0; $i < strlen($s2); $i++){
        $char_count[$s2[$i]]--;
    }
    foreach($char_count as $key => $val){
        if($val > 0){
            $count++;
        }
    }
    return $count;
}

$s1 = "ddcf";
$s2 = "cedk";
    
echo countManipulations($s1, $s2);